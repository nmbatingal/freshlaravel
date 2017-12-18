@extends('layouts.print-layout')

<!-- TITLE -->
@section('title')
    Print | Selection Lineup - 
@endsection

<!-- CASCADING STYLE SHEET -->
@section('styles')
<style>
    body {
        font-size: 11pt;
        font-family: "Calibri";
    }
    
    .yourDiv {
        position: absolute;
        left: 80%;
        top: 5%;
        width: 129px;
        padding: 10px;
        border: 1px solid #000;
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
        padding: 5px;
    }
    
    .table-header {
        border: 0;
    }
    
    .table-header td {
        border: 0;
    }
    
    .table th, td {
        border: 1px solid #000;
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
              <div class="text-center"><b>FM-FAS-HR F1</b></div>
              <div class="text-center">Rev o / 10-16-09</div>
            </div>
        </div>
      <table class="table table-header">
            <tbody>
                <tr><td colspan="3" class="text-center">DEPARTMENT OF SCIENCE AND TECHNOLOGY</td></tr>
                <tr><td colspan="3" class="text-center">CARAGA REGION</td></tr>               
                <tr style=""><td height="52" colspan="3" class="text-center"><b>EVALUATION CRITERIA (NEW ENTRANTS)</b></td></tr>
                <tr>
                  <td width="25%" height="20" align="left" valign="middle"><strong>CONSIDERATION FOR THE POSITION OF:</strong></td>
                  <td width="25%" align="left" valign="middle" style="border-bottom: 1px solid #000;" class="text-center">{{ $selection->position['title'] }} ({{ $selection->position['acronym'] }})</td>
                  <td width="50%" align="left" valign="middle" >&nbsp;</td>
              </tr>
        </tbody>
      </table><br>
        
      <table class="table">
            <thead>
                <tr>
                    <th rowspan="2">NAME OF APPLICANT</th>
                    <th width="8%" height="52" align="center" valign="top" style="border-bottom: 0;">I. EDUCATION</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">II. RELEVANT TRAININGS</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">III. RELEVANT WORK EXPERIENCE</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">IV. PHYSICAL CHARAC. &amp; PERSONALITY TRAITS</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">V. INTERVIEW &amp; COMM. SKILLS</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">VI. SPECIALS SKILLS</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">VII. SPECIAL AWARD</th>
                    <th width="8%" align="center" valign="top" style="border-bottom: 0;">VIII. POTENTIAL</th>
                    <th width="8%" rowspan="2">TOTAL</th>                    
                </tr>
                <tr>
                  <th height="26" valign="bottom" style="border-top: 0;">20%</th>
                  <th valign="bottom" style="border-top: 0;">10%</th>
                  <th valign="bottom" style="border-top: 0;">10%</th>
                  <th valign="bottom" style="border-top: 0;">20%</th>
                  <th valign="bottom" style="border-top: 0;">15%</th>
                  <th valign="bottom" style="border-top: 0;">5%</th>
                  <th valign="bottom" style="border-top: 0;">5%</th>
                  <th valign="bottom" style="border-top: 0;">15%</th>
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
                    <td height="26" align="center">
                    </td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                </tr>
            <?php
                }

                $blanktd = 15;
                if( $applicant > 15 ) {
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
                        <td align="left"></td>
                        <td height="26" align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
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
        <table class="table table-footer">
            <colgroup>
                <col width="5%"/>
                <col width="26%"/>
                <col width="46%"/>
                <col width="18%"/>                                
                <col width="5%"/>
            </colgroup>
            <tfoot>
                <tr>
                    <td width="7%" height="52"></td>
                    <td width="25%" style="border-bottom: 1px solid #000;">&nbsp;</td>
                    <td width="46%"></td>
                    <td width="15%" style="border-bottom: 1px solid #000;">&nbsp;</td>
                    <td width="7%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Name of Rater</td>
                    <td></td>
                    <td>Date</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection