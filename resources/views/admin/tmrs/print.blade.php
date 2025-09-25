<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print TMR {{ $tmr->number }}</title>
    <style>
        body{font-family: Arial, Helvetica, sans-serif; font-size: 13px; color:#111}
        h1{font-size:18px;margin:0 0 8px}
        .muted{color:#555}
        table{border-collapse:collapse;width:100%}
        td{padding:4px 6px;vertical-align:top}
        .label{font-weight:bold}
        .roman{width:30px}
        .section-title{font-weight:bold;margin:14px 0 6px}
        .divider{height:1px;background:#ddd;margin:10px 0}
    </style>
    <script>
        function roman(n){const map=["","I","II","III","IV","V","VI","VII","VIII","IX","X"];return map[n]||n;}
    </script>
</head>
<body>
    <h1>Toll Manufacture Request</h1>
    <div class="muted">TMR Number: <strong>{{ $tmr->number }}</strong></div>
    <div class="muted">Request Date: <strong>{{ $tmr->request_date ?? ($tmr->submitted_at?->toDateString()) }}</strong></div>
    <div class="divider"></div>

    <div class="section-title">I. Information & Contact</div>
    <table>
        @php($c = $tmr->contactInformation)
        @php($pn = $tmr->productNames ?? collect())
        @php($rows = [
            ['Request Date', $tmr->request_date ?? optional($tmr->submitted_at)->toDateString()],
            ['Company', $c->company ?? ''],
            ['Address', $c->address ?? ''],
            ['Phone Number', $c->phone_number ?? ''],
            ['Contact Person', $c->contact_person ?? ''],
            ['E-mail', $c->email ?? ''],
            ['Product Name', $pn->pluck('product_name')->filter()->implode(', ')],
            ['Actives / Formulation', optional($tmr->formulation)->actives_formulation ?? ''],
        ])
        @endphp
        @foreach($rows as $i => $row)
            <tr>
                <td class="roman">{{ [1=>'I','II','III','IV','V','VI','VII','VIII'][$i+1] ?? ($i+1) }}.</td>
                <td class="label">{{ $row[0] }}</td>
                <td>:</td>
                <td>{{ $row[1] }}</td>
            </tr>
        @endforeach
    </table>

    <script>
        // Auto print when opened in a new window/tab (optional)
        // window.print();
    </script>
</body>
</html>

