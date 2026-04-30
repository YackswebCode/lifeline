<!DOCTYPE html>
<html>
<head>
    <title>Medical Image Analysis Report</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #0ea5e9; padding-bottom: 20px; }
        .header h2 { color: #0ea5e9; margin-bottom: 5px; }
        .header .meta { margin: 10px 0; font-size: 11px; }
        .header .meta strong { color: #0c4a6e; }
        p { margin: 8px 0; }
        h3 { color: #0ea5e9; margin-top: 25px; margin-bottom: 10px; }
        ul { padding-left: 20px; }
        li { margin-bottom: 4px; }
        .disclaimer { margin-top: 30px; font-size: 10px; color: gray; border-top: 1px solid #ccc; padding-top: 10px; }
    </style>
</head>
<body>

@php
    $formatted = '';
    $lines = explode("\n", $analysis->summary);
    $inList = false;
    $tableRows = [];
    $inTable = false;

    foreach ($lines as $line) {
        $line = trim($line);

        // Table detection
        if (str_starts_with($line, '|') && str_ends_with($line, '|')) {
            // Check if separator row (only dashes, colons, spaces, pipes)
            $stripped = preg_replace('/[|\s\-:]+/', '', $line);
            if ($stripped === '') {
                // Separator row – skip but mark we are in a table
                $inTable = true;
                continue;
            } else {
                // Header or data row
                if (!$inTable && empty($tableRows)) {
                    $inTable = true;
                }
                $tableRows[] = $line;
                continue;
            }
        } else {
            if ($inTable && !empty($tableRows)) {
                $formatted .= buildTableHTML($tableRows);
                $tableRows = [];
                $inTable = false;
            }
        }

        // ---- Normal markdown ----
        if ($line === '') {
            if ($inList) { $formatted .= '</ul>'; $inList = false; }
            continue;
        }

        // Headings (### or ####)
        if (preg_match('/^#{3,4}\s+(.*)/', $line, $m)) {
            if ($inList) { $formatted .= '</ul>'; $inList = false; }
            $text = e($m[1]);
            $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
            $text = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $text);
            $formatted .= '<h3>' . $text . '</h3>';
            continue;
        }

        // Unordered list
        if (preg_match('/^-\s+(.*)/', $line, $m)) {
            if (!$inList) { $formatted .= '<ul>'; $inList = true; }
            $item = e($m[1]);
            $item = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $item);
            $item = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $item);
            $formatted .= '<li>' . $item . '</li>';
            continue;
        }

        // Normal paragraph
        if ($inList) { $formatted .= '</ul>'; $inList = false; }
        $escaped = e($line);
        $escaped = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $escaped);
        $escaped = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $escaped);
        $formatted .= '<p>' . $escaped . '</p>';
    }

    // Close remaining list or table
    if ($inList) { $formatted .= '</ul>'; }
    if ($inTable && !empty($tableRows)) {
        $formatted .= buildTableHTML($tableRows);
    }

    // Helper function for PDF table
   function buildTableHTML($rows) {
    if (empty($rows)) return '';
    $html = '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%; margin:15px 0;">';
    $header = array_shift($rows);
    $cells = array_map('trim', array_filter(explode('|', $header), fn($c) => $c !== ''));

    // Helper to apply bold/italic inside a pre-escaped string
    $formatCell = function($text) {
        $text = htmlspecialchars($text);
        $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.+?)\*/s', '<em>$1</em>', $text);
        return $text;
    };

    $html .= '<thead><tr>';
    foreach ($cells as $cell) {
        $html .= '<th style="background-color:#f0f9ff; padding:8px;">' . $formatCell($cell) . '</th>';
    }
    $html .= '</tr></thead><tbody>';

    foreach ($rows as $row) {
        $cells = array_map('trim', array_filter(explode('|', $row), fn($c) => $c !== ''));
        $html .= '<tr>';
        foreach ($cells as $cell) {
            $html .= '<td style="padding:6px;">' . $formatCell($cell) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</tbody></table>';
    return $html;
}
@endphp

<div class="header">
    <h2>Medical Image Analysis Report</h2>

    <table style="margin: 0 auto; text-align: left; font-size: 11px;">
        <tr>
            <td><strong>Tracking ID:</strong></td>
            <td>{{ $analysis->tracking_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Patient Name:</strong></td>
            <td>{{ $analysis->patient_name ?? 'Not provided' }}</td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td>{{ $analysis->created_at->format('F j, Y') }}</td>
        </tr>
        <tr>
            <td><strong>Confidence:</strong></td>
            <td>{{ $analysis->confidence }}%</td>
        </tr>
    </table>
</div>

<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ public_path('storage/' . $analysis->image) }}" style="max-height: 300px;">
</div>

<h3>Medical Summary</h3>
{!! $formatted !!}

<div class="disclaimer">
    AI-assisted result only. Not a medical diagnosis.
</div>

</body>
</html>