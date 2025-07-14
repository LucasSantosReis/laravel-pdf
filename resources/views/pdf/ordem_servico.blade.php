
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ordem de Serviço</title>
    <style>
        @page {
            margin: 1cm 1cm 1cm 1cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            border-bottom: 1px solid #000;
            padding-bottom: 8px;
            margin-bottom: 8px;
        }
        .logo {
            width: 120px;
        }
        .company {
            text-align: center;
            flex: 1;
            font-size: 16px;
            font-weight: bold;
        }
        .form-info {
            text-align: right;
            font-size: 10px;
        }
        .os-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 22px;
            font-weight: bold;
            margin: 12px 0 8px 0;
        }
        .os-title span {
            font-size: 18px;
            font-weight: normal;
        }
        .ident-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }
        .ident-table td {
            border: 1px solid #ccc;
            padding: 4px 6px;
            font-size: 11px;
            vertical-align: top;
            text-align: left;
        }
        .ident-table td.ident-label {
            text-align: center;
        }
        .ident-table td:not(.ident-label) {
            text-align: left;
        }
        .ident-label {
            font-weight: normal;
            width: 110px;
            vertical-align: middle;
        }
        .dates-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0 8px 0;
            font-size: 12px;
        }
        .section-title {
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            margin: 12px 0 6px 0;
        }
        .itens-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .itens-table th, .itens-table td {
            border: 1px solid #000;
            padding: 4px 6px;
            font-size: 11px;
        }
        .itens-table th {
            background: #f5f5f5;
            font-weight: bold;
            text-align: center;
        }
        .itens-table td {
            vertical-align: top;
        }
        .footer {
            position: absolute;
            bottom: 1cm;
            left: 1cm;
            right: 1cm;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }
        .assinatura {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
        }
        .assinatura-linha {
            margin: 18px 0 0 0;
            border-top: 1px solid #000;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
        /* Quebra de página para PDF */
        .page-break {
            page-break-after: always;
        }
        /* Margem superior fixa nas demais páginas */
        .top-margin {
            height: 1cm;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho como tabela -->
    <table style="width:100%; border-collapse:collapse; margin-bottom: 8px;">
        <tr>
            <td style="width: 28%; border: 1px solid #ccc; text-align:center; vertical-align:middle; padding: 0;">
                <img src="http://host.docker.internal:8080/imagens/logo.png" alt="Logo MTX" style="width: 100%; height: auto; display: block; margin: 0; padding: 0; border: none;">
            </td>
            <td style="width: 54%; border: 1px solid #ccc; border-left: none; border-right: none; text-align:center; vertical-align:middle; padding-left:2cm; padding-right:2cm;">
                <span style="font-size: 1.3em; font-weight: bold; white-space:nowrap;">MTX Aviation Manutenção De Aeronaves Ltda</span><br>
                <span style="font-size: 1em; font-weight:normal;">Sorocaba/SP - COM 201306-41/ANAC</span>
            </td>
            <td style="width: 18%; border: 1px solid #ccc; text-align:center; vertical-align:middle; font-size: 1.1em;">
                F.TEC.015.REV03<br>
                15/07/2024
            </td>
        </tr>
    </table>
    <table style="width:100%; border-collapse:collapse; margin-bottom: 8px;">
        <tr>
            <td style="width: 50%; text-align: left; font-size: 2em; font-weight: bold; padding-left: 0.2cm;">OS #{{ $os_numero ?? '########' }}</td>
            <td style="width: 50%; text-align: right; font-size: 2em; font-weight: bold; padding-right: 0.2cm;">{{ $matricula ?? 'PP-XXX' }}</td>
        </tr>
    </table>
    <table class="ident-table" style="margin-bottom:0;">
        <tr>
            <td class="ident-label" style="width:93pt; border-top: 1pt solid #DCDCDC; border-left: 1pt solid #DCDCDC; border-bottom: 1pt solid #DCDCDC; border-right: 1pt solid #DCDCDC; padding-left: 28pt;">
                AIRFRAME
            </td>
            <td>
                SN: {{ $airframe['sn'] ?? '' }} &nbsp;&nbsp; Modelo: {{ $airframe['modelo'] ?? '' }} &nbsp;&nbsp; Fabricante: {{ $airframe['fabricante'] ?? '' }} &nbsp;&nbsp; Ano de Fabricação: {{ $airframe['ano'] ?? '' }}<br>
                TSN: {{ $airframe['tsn'] ?? '' }} &nbsp;&nbsp; TSO: {{ $airframe['tso'] ?? '' }} &nbsp;&nbsp; CSN: {{ $airframe['csn'] ?? '' }} &nbsp;&nbsp; CSO: {{ $airframe['cso'] ?? '' }}<br>
                Revisão: {{ $airframe['revisao'] ?? '' }} / PN:{{ $airframe['pn'] ?? '' }}
            </td>
        </tr>
        <tr>
            <td class="ident-label">LEFT ENGINE</td>
            <td>
                SN: {{ $left_engine['sn'] ?? '' }} &nbsp;&nbsp; Modelo: {{ $left_engine['modelo'] ?? '' }} &nbsp;&nbsp; Fabricante: {{ $left_engine['fabricante'] ?? '' }}<br>
                TSN: {{ $left_engine['tsn'] ?? '' }} &nbsp;&nbsp; TSO: {{ $left_engine['tso'] ?? '' }} &nbsp;&nbsp; CSN: {{ $left_engine['csn'] ?? '' }} &nbsp;&nbsp; CSO: {{ $left_engine['cso'] ?? '' }}<br>
                Revisão: {{ $left_engine['revisao'] ?? '' }} / PN:{{ $left_engine['pn'] ?? '' }}
            </td>
        </tr>
        <tr>
            <td class="ident-label">RIGHT ENGINE</td>
            <td>
                SN: {{ $right_engine['sn'] ?? '' }} &nbsp;&nbsp; Modelo: {{ $right_engine['modelo'] ?? '' }} &nbsp;&nbsp; Fabricante: {{ $right_engine['fabricante'] ?? '' }}<br>
                TSN: {{ $right_engine['tsn'] ?? '' }} &nbsp;&nbsp; TSO: {{ $right_engine['tso'] ?? '' }} &nbsp;&nbsp; CSN: {{ $right_engine['csn'] ?? '' }} &nbsp;&nbsp; CSO: {{ $right_engine['cso'] ?? '' }}<br>
                Revisão: {{ $right_engine['revisao'] ?? '' }} / PN:{{ $right_engine['pn'] ?? '' }}
            </td>
        </tr>
        <tr>
            <td class="ident-label">LEFT PROPELLER</td>
            <td>
                SN: {{ $left_propeller['sn'] ?? '' }} &nbsp;&nbsp; Modelo: {{ $left_propeller['modelo'] ?? '' }} &nbsp;&nbsp; Fabricante: {{ $left_propeller['fabricante'] ?? '' }}<br>
                TSN: {{ $left_propeller['tsn'] ?? '' }} &nbsp;&nbsp; TSO: {{ $left_propeller['tso'] ?? '' }} &nbsp;&nbsp; CSN: {{ $left_propeller['csn'] ?? '' }} &nbsp;&nbsp; CSO: {{ $left_propeller['cso'] ?? '' }}<br>
                Revisão: {{ $left_propeller['revisao'] ?? '' }} / PN:{{ $left_propeller['pn'] ?? '' }}
            </td>
        </tr>
        <tr>
            <td class="ident-label">RIGHT PROPELLER</td>
            <td>
                SN: {{ $right_propeller['sn'] ?? '' }} &nbsp;&nbsp; Modelo: {{ $right_propeller['modelo'] ?? '' }} &nbsp;&nbsp; Fabricante: {{ $right_propeller['fabricante'] ?? '' }}<br>
                TSN: {{ $right_propeller['tsn'] ?? '' }} &nbsp;&nbsp; TSO: {{ $right_propeller['tso'] ?? '' }} &nbsp;&nbsp; CSN: {{ $right_propeller['csn'] ?? '' }} &nbsp;&nbsp; CSO: {{ $right_propeller['cso'] ?? '' }}<br>
                Revisão: {{ $right_propeller['revisao'] ?? '' }} / PN:{{ $right_propeller['pn'] ?? '' }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px 12px; border-top: none; border-left: 1px solid #ccc; border-bottom: 1px solid #ccc; border-right: none;">Data de Início: {{ $data_inicio ?? '' }}</td>
            <td style="padding: 8px 12px; border-top: none; border-right: 1px solid #ccc; border-bottom: 1px solid #ccc; border-left: none; text-align: right;">Término Previsto: {{ $data_termino ?? '' }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 15px; font-weight: normal; border: 1px solid #ccc; background: none; margin-top:1cm; margin-bottom:1cm;">RESUMO DE ITENS EXECUTADOS</td>
        </tr>
        @foreach($itens as $i => $item)
            <tr>
                <td style="text-align:center;">{{ $i+1 }}</td>
                <td>
                    <div>{{ $item['descricao'] }}</div>
                    <div style="font-size:11px;">Equipe: {{ $item['equipe'] }}</div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="footer" style="font-weight: bold;">
        DECLARAÇÃO DE AERONAVEGABILIDADE
    </div>
    <div class="assinatura">
        <div class="assinatura-linha"></div>
        Assinatura do Inspetor Responsável<br>
        SDCO
    </div>
</body>
</html>
