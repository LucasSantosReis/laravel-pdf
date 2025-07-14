<?php

namespace App\Http\Controllers;

use PDF;

class OrdemServicoController extends Controller
{
    public function gerarPdf()
    {
        $dados = [
            'os_numero' => '03372/25',
            'matricula' => 'PP-JCA',
            'airframe' => [
                'sn' => 'LA-107',
                'tsn' => '9442.7',
                'modelo' => 'F90',
                'tso' => 'N/A',
                'fabricante' => 'BEECH',
                'csn' => '10353',
                'ano' => '1981',
                'cso' => 'N/A',
                'revisao' => 'Manual: C0 / Revision: M.M.',
                'manual' => '',
                'pn' => '109-590010-19',
            ],
            'left_engine' => [
                'sn' => 'PCE-92264',
                'tsn' => '9442.7',
                'modelo' => 'PT6A-135',
                'tso' => '2412',
                'fabricante' => 'PRATT & WHITNEY CANADA',
                'csn' => '10350',
                'cso' => '2126',
                'revisao' => 'Manual: 49 / Revision: M.M.',
                'manual' => '',
                'pn' => '3043512',
            ],
            'right_engine' => [
                'sn' => 'PCE-92269',
                'tsn' => '9442.7',
                'modelo' => 'PT6A-135',
                'tso' => '2412',
                'fabricante' => 'PRATT & WHITNEY CANADA',
                'csn' => '10350',
                'cso' => '2126',
                'revisao' => 'Manual: 49 / Revision: M.M.',
                'manual' => '',
                'pn' => '3043512',
            ],
            'left_propeller' => [
                'sn' => 'EAA-1533',
                'tsn' => '4275.6',
                'modelo' => 'HC-B4TN-3B',
                'tso' => '75.7',
                'fabricante' => 'HARTZELL',
                'csn' => 'N/A',
                'cso' => 'N/A',
                'revisao' => 'Manual: 22 / Revision: P.O.M.',
                'manual' => '',
                'pn' => '139 (61-00-39)',
            ],
            'right_propeller' => [
                'sn' => 'EAA-1553',
                'tsn' => '4275.6',
                'modelo' => 'HC-B4TN-3B',
                'tso' => '359.4',
                'fabricante' => 'HARTZELL',
                'csn' => 'N/A',
                'cso' => 'N/A',
                'revisao' => 'Manual: 22 / Revision: P.O.M.',
                'manual' => '',
                'pn' => '139 (61-00-39)',
            ],
            'data_inicio' => '09/06/2025',
            'data_termino' => '20/06/2025',
            'itens' => [
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DO TRANSMISSOR DE PRESSÃO DE OLEO LADO DIREITO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO PNEU INTERNO DIREITO APRESENTANDO PERDA DE PRESSÃO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'AVALIAR JUNTAS DA TAMPA DA NACELLE ESQUERDA',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) AIRFRAME > LUBRICATE ITEMS 6M\nIntervalo: 6M | Horas: N/A | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) LEFT ENGINE > CHECK AGB INTERNAL SCAVENGE OIL PUMP INLET SCREEN\nIntervalo: 6M | Horas: 200 | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) RIGHT ENGINE > CHECK AGB INTERNAL SCAVENGE OIL PUMP INLET SCREEN\nIntervalo: 6M | Horas: 200 | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'TANQUE DA NACELLE LH DANIFICADO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'BARRAMENTO BUSTIE DIREITO POR VEZES ABRE',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'AUDIOS AURAIS DO SISTEMA DE AVIONICS INOPERANTE',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DE UMA PROBE DE COMBUSTÍVEL LADO ESQUERDO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DE INDICADOR DE COMBUSTÍVEL LH E AFERIÇÃO DO SISTEMA',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'VERIFICAR COMANDO DO TRIM QUANTO À INTEGRIDADE',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
            ],
        ];

        $pdf = PDF::loadView('pdf.ordem_servico', $dados)
            ->setPaper('a4')
            ->setOption('margin-top', '10mm')
            ->setOption('margin-bottom', '10mm')
            ->setOption('footer-spacing', 5);
        return $pdf->download('ordem_servico.pdf');
    }

    public function previewHtml()
    {
        $dados = [
            'os_numero' => '03372/25',
            'matricula' => 'PP-JCA',
            'airframe' => [
                'sn' => 'LA-107',
                'tsn' => '9442.7',
                'modelo' => 'F90',
                'tso' => 'N/A',
                'fabricante' => 'BEECH',
                'csn' => '10353',
                'ano' => '1981',
                'cso' => 'N/A',
                'revisao' => 'Manual: C0 / Revision: M.M.',
                'manual' => '',
                'pn' => '109-590010-19',
            ],
            'left_engine' => [
                'sn' => 'PCE-92264',
                'tsn' => '9442.7',
                'modelo' => 'PT6A-135',
                'tso' => '2412',
                'fabricante' => 'PRATT & WHITNEY CANADA',
                'csn' => '10350',
                'cso' => '2126',
                'revisao' => 'Manual: 49 / Revision: M.M.',
                'manual' => '',
                'pn' => '3043512',
            ],
            'right_engine' => [
                'sn' => 'PCE-92269',
                'tsn' => '9442.7',
                'modelo' => 'PT6A-135',
                'tso' => '2412',
                'fabricante' => 'PRATT & WHITNEY CANADA',
                'csn' => '10350',
                'cso' => '2126',
                'revisao' => 'Manual: 49 / Revision: M.M.',
                'manual' => '',
                'pn' => '3043512',
            ],
            'left_propeller' => [
                'sn' => 'EAA-1533',
                'tsn' => '4275.6',
                'modelo' => 'HC-B4TN-3B',
                'tso' => '75.7',
                'fabricante' => 'HARTZELL',
                'csn' => 'N/A',
                'cso' => 'N/A',
                'revisao' => 'Manual: 22 / Revision: P.O.M.',
                'manual' => '',
                'pn' => '139 (61-00-39)',
            ],
            'right_propeller' => [
                'sn' => 'EAA-1553',
                'tsn' => '4275.6',
                'modelo' => 'HC-B4TN-3B',
                'tso' => '359.4',
                'fabricante' => 'HARTZELL',
                'csn' => 'N/A',
                'cso' => 'N/A',
                'revisao' => 'Manual: 22 / Revision: P.O.M.',
                'manual' => '',
                'pn' => '139 (61-00-39)',
            ],
            'data_inicio' => '09/06/2025',
            'data_termino' => '20/06/2025',
            'itens' => [
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DO TRANSMISSOR DE PRESSÃO DE OLEO LADO DIREITO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO PNEU INTERNO DIREITO APRESENTANDO PERDA DE PRESSÃO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'AVALIAR JUNTAS DA TAMPA DA NACELLE ESQUERDA',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) AIRFRAME > LUBRICATE ITEMS 6M\nIntervalo: 6M | Horas: N/A | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) LEFT ENGINE > CHECK AGB INTERNAL SCAVENGE OIL PUMP INLET SCREEN\nIntervalo: 6M | Horas: 200 | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => '(MSR) RIGHT ENGINE > CHECK AGB INTERNAL SCAVENGE OIL PUMP INLET SCREEN\nIntervalo: 6M | Horas: 200 | Ciclos N/A',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'TANQUE DA NACELLE LH DANIFICADO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'BARRAMENTO BUSTIE DIREITO POR VEZES ABRE',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'AUDIOS AURAIS DO SISTEMA DE AVIONICS INOPERANTE',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DE UMA PROBE DE COMBUSTÍVEL LADO ESQUERDO',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
                [
                    'descricao' => 'EFETUAR SUBSTITUIÇÃO DE INDICADOR DE COMBUSTÍVEL LH E AFERIÇÃO DO SISTEMA',
                    'equipe' => 'Marcio Messias Silva - inspector | Silvio Vicente - mechanic',
                ],
                [
                    'descricao' => 'VERIFICAR COMANDO DO TRIM QUANTO À INTEGRIDADE',
                    'equipe' => 'André Segato - inspector | Thiago Paulucci Dos Santos - inspector',
                ],
            ],
        ];
        return view('pdf.ordem_servico', $dados);
    }
 
}
