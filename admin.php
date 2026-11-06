<?php
include 'db.php';

$result = $conn->query("SELECT * FROM visitor_logs ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT DEPARTMENT - VICTIM LOGS</title>
    <style>
        body {
            background-color: #0d0d0d;
            color: #00ff41;
            font-family: monospace;
            padding: 30px;
        }
        h1 { color: #ff0000; margin-bottom: 20px; }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #00ff41;
        }
        th, td {
            border: 1px solid #00ff41;
            padding: 12px;
            text-align: left;
        }
        th { background-color: #003300; }
        tr:nth-child(even) { background-color: #111; }
    </style>
</head>
<body>

<h1>💀 HAUNTED IT HELPDESK - VISITOR LOGS</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Ticket No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>Curse / Message</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td style="color: #ff0000; font-weight: bold;"><?php echo $row['ticket_number']; ?></td>
                    <td><?php echo htmlspecialchars($row['visitor_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['department']); ?></td>
                    <td><?php echo htmlspecialchars($row['curse_assigned']); ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">No victims logged yet...</td></tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>