<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }
            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }
            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }
            strong {
                font-weight: bolder;
            }
            img {
                vertical-align: middle;
                border-style: none;
            }
            table {
                border-collapse: collapse;
            }
            th {
                text-align: inherit;
            }
            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }
            h4, .h4 {
                font-size: 1.5rem;
            }
            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }
            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            .table tbody + tbody {
                border-top: 2px solid #dee2e6;
            }
            .mt-5 {
                margin-top: 3rem !important;
            }
            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }
            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }
            .text-right {
                text-align: right !important;
            }
            .text-center {
                text-align: center !important;
            }
            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
        </style>
    </head>

    <body>
        {{-- Header --}}

        <table class="table mt-5">
            <tbody>
                <tr >
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong> Bon Achat </strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        <p>Bon Numero:  <strong>{{ $facture_vente->id }}</strong></p>
                        <p>Date : <strong>{{ $facture_vente->created_at }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr style="{
                    padding: 0.75rem;
                    border-top: 1px solid #dee2e6;
                }">
                    <th class="border-0 pl-0 party-header" width="98.5%">
                        KaynaTech
                    </th>
                    <th class="border-0" width="3%"></th>
                </tr>
            </thead>
            <tbody>
                <tr style="{
                    padding: 0.75rem;
                    border-top: 1px solid #dee2e6;
                }">
                    <td class="px-0">                        
                            <p class="seller-address">
                                Address : Premier Novembre
                            </p>


                            <p class="seller-phone">
                               Telephone : 0777777
                            </p>

                            <p class="seller-custom-field">
                                Site Web: kaynatech.com
                            </p>
                    </td>
                    <td class="border-0"></td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <table class="table">
            <thead>
                <tr style="{
                    padding: 0.75rem;
                    border-top: 1px solid #dee2e6;
                }">
                    <th scope="col" class="border-0 pl-0">Designiation</th>
                    <th scope="col" class="text-center border-0">quantite</th>
                    <th scope="col" class="text-right border-0">Prix_unite</th>
                    <th scope="col" class="text-right border-0">Prix Total</th>
                </tr>
            </thead>
            <tbody>
                {{-- Items --}}
                @foreach($vents as $vent)
                <tr style="{
                    padding: 0.75rem;
                    border-top: 1px solid #dee2e6;
                }">
                    <td class="pl-0">{{ $vent->article->designiation}}</td>
                    <td class="text-center">{{ $vent->quantity }}</td>
                    <td class="text-center">{{ $vent->prix_vente }}</td>
                    <td class="text-center">{{ $vent->total }}</td>
                </tr>
                @endforeach
                    <tr>
                        <td colspan="2" class="border-0"></td>
                        <td class="text-right pl-0">Total</td>
                        <td class="text-right pr-0 total-amount">
                            {{ $facture_vente->total }}
                        </td>
                    </tr>
            </tbody>
        </table>
    </body>
</html>