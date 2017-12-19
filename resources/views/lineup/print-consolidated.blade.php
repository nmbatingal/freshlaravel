@extends('layouts.print-layout')

<!-- TITLE -->
@section('title')
    Print | Selection Lineup - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
<style>
    body {
        font-size: 8pt;
        font-family: "Calibri";
    }
    
    .yourDiv {
        position: absolute;
        left: 85%;
        top: 1pt;
        width: 129px;
        padding: 10px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right !important;
    }

    .text-left {
        text-align: left !important;
    }

    .table {
        border: 1px solid #000;
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-header {
        border: 0;
    }
    
    .table-header td {
        border: 0;
    }
    
    .table th, td {
        border: 1px solid #000;
        padding: 0px;
    }
    
    .table-body td {
        padding: 3px;
    }

    .table-footer {
        border: 0;
    }

    .table-footer td {
        border: 0;
        text-align: center;
    }

    @page {
        size: A4 landscape;
        margin: 2mm 8mm;
    }

    @media print {
        body {
            margin: 0mm !important;
        }
        .page {
            margin: 0mm !important;
        }

        .no-print {
            display: none;
        }
    }
</style>
@endsection('styles')

@section('content')
    <div class="no-print">
        <button onclick= "window.print()"><i class="fa fa-print fa-fw"></i> Print</button>
        <br><br>    
    </div>
    
    <div class="page">
      <div class="yourDiv">
            <div style="margin:auto;">
              <div class="text-center"><b>FM-FAS-HR F5</b></div>
              <div class="text-center">Rev. 1/04-28-10</div>
            </div>
        </div>

        <table class="table table-header">
            <tbody>
                <tr><td width="100%" class="text-center"><b>DEPARTMENT OF SCIENCE AND TECHNOLOGY - CARAGA</b></td></tr>
                <tr><td class="text-center"><i>CSU</i> Campus, Ampayon, Butuan City</td></tr>                  
                <tr><td class="text-center">Tel. # (085) 341-9551 / 342-5345      Fax # (085) 342-5684</td></tr>             
                <tr style=""><td height="71" class="text-center"><b>CONSOLIDATED RATER'S ASSESSMENT FOR <u>{{ strtoupper($selection->position['title']) }} ({{ $selection->position['acronym'] }})</u></b></td></tr>
            </tbody>
        </table>
        
        <table class="table table-body">
            <thead>
                <tr>
                    <th>NAME OF CANDIDATE</th>
                    <th width="12%" height="52" align="center" valign="center" style="border-bottom: 0;">IS Mezo</th>
                    <th width="12%" align="center" valign="center" style="border-bottom: 0;">RN Varela</th>
                    <th width="12%" align="center" valign="center" style="border-bottom: 0;">NM Ajoc</th>
                    <th width="12%" align="center" valign="center" style="border-bottom: 0;">MM Carlon</th>
                    <th width="12%" align="center" valign="center" style="border-bottom: 0;">Total</th>
                    <th width="12%" align="center" valign="center" style="border-bottom: 0;">Final Ranking</th>               
                </tr>
            </thead>
            <tbody>
                <?php
                    $applicant = count($group);
                    foreach ($group as $i => $selection) {
                ?>
                    <tr valign="middle">
                        <td align="left">
                            {{ $selection->applicant['lastname'] . ', ' . $selection->applicant['firstname'] }} {{ !empty($selection->applicant['middlename']) ? $selection->applicant['middlename'] : '' }}
                        </td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <?php
                    }

                    $blanktd = 20;
                    if( $applicant > 20 ) {
                        $full_page_count = intval( $applicant / 23 );
                        if ( $full_page_count > 0 ) {

                            $rem = intval( $applicant % 23 );
                            $blanktd -= $rem % $blanktd;

                        } else {
                            $blanktd += 23 - $applicant;
                        }
                    } else {
                        $blanktd -= $applicant;
                    }
                ?>
                @for( $i = $blanktd; $i > 0 ; $i-- )
                    <tr valign="middle">
                        <td align="left">&nbsp;</td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                @endfor
            </tbody>
        </table>
        
        <br><br>

        <table class="table table-footer">
            <tr>
              <td width="15%" style="text-align: left" scope="col">Consolidated by:</td>
              <td width="15%" scope="col">&nbsp;</td>
              <td width="14%" scope="col">&nbsp;</td>
              <td width="16%" style="text-align: left" scope="col">Approved:</td>
              <td width="12%" scope="col">&nbsp;</td>
              <td width="14%" scope="col">&nbsp;</td>
              <td width="14%" scope="col">&nbsp;</td>
            </tr>
            <tr>
              <td height="40" valign="bottom" style="text-align: center">IMELDA S. MEZO</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td valign="bottom" style="text-align: center">DOMINGA D. MALLONGA</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td style="text-align: center">PSB Chairman</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td style="text-align: center">Regional Director</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
        </table>
    </div>
@endsection