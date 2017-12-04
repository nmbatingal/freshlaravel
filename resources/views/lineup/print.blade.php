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

    .table {
        border-top: 1px solid #000000 !important;
        border-right: 1px solid #000000 !important;
        border-left: 1px solid #000000 !important;
        border-bottom: 1px solid #000000 !important;
        border-collapse: collapse;
        width: 100%;
        padding: 8px;
    }

    @page {
        size: A4 landscape;
        margin: 2mm 8mm;
    }

    @media print {
        body {
            margin: 0mm !important;
            background-color: #eaefe0;
        }
        .page {
            margin: 0mm !important;
            background-color: #eae;
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
    </div>

    <div class="page">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-center" colspan="7">SELECTION LINE-UP OF APPLICANTS</td>
                    </tr>

                    <tr>
                        <td colspan="2">Position Title</td>
                        <td colspan="5">: Science Research Specialist II</td>
                    </tr>

                    <tr>
                        <td colspan="2">Position Title</td>
                        <td colspan="5">: Science Research Specialist II</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-lineup">

            </table>
    </div>
@endsection