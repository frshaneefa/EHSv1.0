<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Submitted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007BFF;
        }
        p {
            line-height: 1.6;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Ticket Submitted</h1>
        <p><span class="label">Subject:</span> {{ $ticket->subject }}</p>
        <p><span class="label">Equipment:</span> {{ $ticket->equipment }}</p>
        <p><span class="label">Quantity:</span> {{ $ticket->quantity }}</p>
        <p><span class="label">Part No./Serial No.:</span> {{ $ticket->part_no }}</p>
        <p><span class="label">Remarks:</span> {{ $ticket->remarks }}</p>
        <p><span class="label">Report Description:</span> {{ $ticket->report_description }}</p>
        <p><span class="label">Service Details:</span> {{ $ticket->service_details }}</p>
    </div>
</body>
</html>
