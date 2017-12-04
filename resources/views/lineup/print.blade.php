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

    .text-center {
        text-align: center !important;
    }

    .text-right {
        text-align: right !important;
    }

    .text-left {
        text-align: left !important;
    }

    .table {
        border-top: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-bottom: 1px solid #000000 !important;
        width: 100%;
        border-collapse: collapse;
        padding: 5px;
    }
    
    .lineup-table {
        border-top: 0 !important;
        border-right: 0 !important;
        border-left:  0 !important;
        border-bottom: 0 !important;
        border-collapse: collapse;
    }
    
    .lineup-list th {
        border: 1px solid #000;
        border-collapse: collapse;
    }
    
    .lineup-list td.border {
        border-left: 1px solid #000;
        border-right: 1px solid #000;
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
        <table class="table lineup-table">
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">SELECTION LINE-UP OF APPLICANTS</td>
                </tr>

                <tr>
                    <td colspan="2">Position Title</td>
                    <td colspan="5">: {{ $selection->position['title'] }}</td>
                </tr>

                <tr>
                    <td colspan="2">Publication No.</td>
                    <td colspan="5">: 
                        <?php
                            $publication = explode(',', $selection->position->publications[0]['publication_no']);

                            foreach ($publication as $value) {
                                echo $value.'; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                        ?>                    
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Item No.</td>
                    <td colspan="5">: 
                        <?php
                            $item = explode(',', $selection->position->items[0]['item_no']);

                            foreach ($item as $value) {
                                echo $value.'; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                        ?>                
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Salaray Grade</td>
                    <td colspan="5">: {{ $selection->position['sal_grade'] }}</td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="4" style="vertical-align:text-top">Qualification Standards</td>
                    <td width="7%">: Education</td>
                    <td width="78%" colspan="4"> - {{ $selection->position->qualifications[0]['education'] }}</td>
                </tr>

                <tr>
                    <td width="7%">&nbsp;&nbsp;Experience</td>
                    <td width="78%" colspan="4"> - {{ $selection->position->qualifications[0]['experience'] }}</td>
                </tr>

                <tr>
                    <td width="7%">&nbsp;&nbsp;Trainings</td>
                    <td width="78%" colspan="4"> - {{ $selection->position->qualifications[0]['trainings'] }}</td>
                </tr>

                <tr>
                    <td width="7%">&nbsp;&nbsp;Eligibilities</td>
                    <td width="78%" colspan="4"> - {{ $selection->position->qualifications[0]['eligibilities'] }}</td>
                </tr>
            </tbody>
        </table>
        
        <br><br>
        
        <table class="table lineup-list">
            <thead>
                <tr>
                    <th style="padding: 5px;" width="2%" valign="top" class="lineup-list" scope="col">&nbsp;</th>
                    <th style="padding: 5px;" width="20%" scope="col">Name</th>
                    <th style="padding: 5px;" width="18%" scope="col">Education</th>
                    <th style="padding: 5px;" width="19%" scope="col">Relevant trainings</th>
                    <th style="padding: 5px;" width="19%" scope="col">Work Experience</th>
                    <th style="padding: 5px;" width="17%" scope="col">Eligibility</th>
                    <th style="padding: 5px;" width="5%" scope="col">Performance Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php


                    $applicants = count($group);
                    foreach ($group as $i => $selection) {
                ?>      <tr>
                            <td valign="top" class="lineup-list border" style="text-align: center; padding: 5px;"> {{ $i + 1 }} </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                                {{ $selection->applicant['lastname'] . ', ' . $selection->applicant['firstname'] }} {{ !empty($selection->applicant['middlename']) ? $selection->applicant['middlename'][0].'.' : '' }}
                            </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                                @foreach($selection->applicant->educations as $educations)
                                    {{ $educations['program'] }} - {{ $educations['school'] }}, {{ date("d-M-y", strtotime($educations['year'])) }}
                                @endforeach
                            </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                                @foreach($selection->applicant->trainings as $training)
                                    {{ $training['title'] }} - {{ $training['conducted_by'] }}, {{ date("d-M-y", strtotime($training['from_date'])) }}
                                @endforeach
                            </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                                @foreach($selection->applicant->experiences as $experience)
                                    {{ $experience['position'] }}, {{ $experience['agency'] }} - {{ date("Y", strtotime($experience['to_date'])) }}</small><br>
                                @endforeach
                            </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                                @foreach($selection->applicant->eligibilities as $eligibility)
                                    {{ $eligibility['title'] }};
                                @endforeach
                            </td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">
                            </td>
                        </tr>
                <?php
                    }

                    $blanktd = 24;
                    if($applicants > 24){
                        $full_page_count = intval($applicants / 42);
                        if($full_page_count > 0){
                            $rem = intval($pr_count % 42);
                            $blanktd -= $rem % $blanktd;
                        } else{
                            $blanktd += 42 - $applicants;
                        }
                    } else{
                        $blanktd -= $applicants;
                    }

                    while ( $blanktd > 0)
                    {
                        echo 
                        '<tr>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                            <td align="left" valign="top" class="border" style="padding: 5px;">&nbsp;</td>
                        </tr>';

                        $blanktd--;
                    }

                ?>
            </tbody>
        </table>

    </div>
@endsection