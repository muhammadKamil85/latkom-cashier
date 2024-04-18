<html>
    <head>
        <title>Cetak Nota <?= $d->invoice ?></title>
        <link rel="stylesheet" href="<?= asset('css/struk.css?time='. md5(time())) ?>">
    </head>
    <body class="struk" onload="printOut()">
        <section class="sheet">
        <?php
            echo '<table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Ceritanya NAMA</td>
                    </tr>
                    <tr>
                        <td>ALAMAT ini tuh</td>
                    </tr>
                    <tr>
                        <td>Telp: 08********76</td>
                    </tr>
                </table>';
            echo(str_repeat("=", 40)."<br/>");
            // $invoice = $d->invoice. str_repeat("&nbsp;", (40 - (strlen($d->invoice))));
            // $kasir = user('name'). str_repeat("&nbsp;", (40 - (strlen(user('name')))));
            // $tgl = date('d-m-Y H:i:s', strtotime($d->created_at)). str_repeat("&nbsp;", (40 - (strlen(date('d-m-Y H:i:s', strtotime($d->created_at))))));
            // $customer = '['. $customer->nia.'] '.$customer->name;
            // $customer = $customer. str_repeat("&nbsp;", (48 - (strlen($customer))));

            echo '<table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                        <td align="left" class="txt-left">Nota&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $invoice. '.</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Kasir</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $kasir.'</td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Tgl.&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;'. $tgl.'</td>
                    </tr>
                    <tr>
                        <td align="left" colspan="3" class="txt-left">'.$customer.'</td>
                    </tr>
                </table>';
            echo '<br/>';
            $tItem = 'Item'. str_repeat("&nbsp;", (13 - strlen('Item')));
            $tQty  = 'Qty'. str_repeat("&nbsp;", (6 - strlen('Qty')));
            $tHarga= str_repeat("&nbsp;", (9 - strlen('Harga'))).'Harga';
            $tTotal= str_repeat("&nbsp;", (10 - strlen('Total'))).'Total';
            $caption = $tItem. $tQty. $tHarga. $tTotal;

            echo    '<table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                            <td align="left" class="txt-left">'. $caption . '</td>
                        </tr>
                        <tr>
                            <td align="left" class="txt-left">'. str_repeat("=", 38) . '</td>
                        </tr>';
            if(!empty( $d->detail ))
            {
                foreach($d->detail as $k=>$v)
                {
                    $item = $v->name. str_repeat("&nbsp;", (38 - (strlen($v->name))));
                    echo '<tr>';
                        echo'<td align="left" class="txt-left">'.$item.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                    $qty        = Rupiah($v->qty,0);
                    $qty        = $qty. str_repeat("&nbsp;", ( 13 - strlen($qty)) );

                    $disk        = Rupiah($v->disc,2).'%';
                    $disk        = str_repeat("&nbsp;", ( 6 - strlen($disk) ) ). $disk;

                    $price      = Rupiah($v->price);
                    $price      = str_repeat("&nbsp;", ( 9 - strlen($price)) ). $price;

                    $total      = Rupiah($v->total,2);
                    $lentotal   = strlen($total);
                    $total      = str_repeat("&nbsp;", ( 10 - $lentotal) ). $total;
                        echo'<td class="txt-left" align="left">'.$qty. $disk. $price. $total .'</td>';

                    echo '</tr>';
                }

                echo '<tr><td>'. str_repeat('-', 38).'</td></tr>';

                //Sub Total
                $titleST = 'Sub&nbspTotal';
                $titleST = $titleST. str_repeat("&nbsp;", ( 19 - strlen($titleST)) );
                $ST      = Rupiah($d->sub_total, 2);
                $ST      = str_repeat("&nbsp;", ( 23 - strlen($ST)) ). $ST;
                echo '<tr><td>'. $titleST. $ST.'</td></tr>';
                //Diskon
                $titleDs = 'Diskon';
                $titleDs = $titleDs. str_repeat("&nbsp;", ( 15 - strlen($titleDs)) );
                $Ds      = Rupiah($d->disc, 2);
                $Ds      = str_repeat("&nbsp;", ( 23 - strlen($Ds)) ). $Ds;
                echo '<tr><td>'. $titleDs. $Ds.'</td></tr>';
                //PPN
                $titlePPn = 'PPN';
                $titlePPn = $titlePPn. str_repeat("&nbsp;", ( 15 - strlen($titlePPn)) );
                $PPn      = Rupiah($d->ppn, 2);
                $PPn      = str_repeat("&nbsp;", ( 23 - strlen($PPn)) ). $PPn;
                echo '<tr><td>'. $titlePPn. $PPn.'</td></tr>';

                if( $d->payment_type == 'Angsuran' )
                {
                    $tX = 'Angsuran (x)';
                    $tX = $tX. str_repeat("&nbsp;", ( 15 - strlen($tX)) );
                    $x  = $d->angsuran;
                    $x  = str_repeat("&nbsp;", ( 23 - strlen($x)) ). $x;
                    echo '<tr><td>'. $tX. $x.'</td></tr>';

                    $tAng = 'Besar Angsuran';
                    $tAng = $tAng. str_repeat("&nbsp;", ( 15 - strlen($tAng)) );
                    $totalAng = Rupiah($d->total_angsuran,2);
                    $totalAng  = str_repeat("&nbsp;", ( 23 - strlen($totalAng)) ). $totalAng;
                    echo '<tr><td>'. $tAng. $totalAng.'</td></tr>';
                }

                //Grand Total
                $titleGT = 'Grand&nbspTotal';
                $titleGT = $titleGT. str_repeat("&nbsp;", ( 19 - strlen($titleGT)) );
                $GT      = Rupiah($d->grand_total, 2);
                $GT      = str_repeat("&nbsp;", ( 23 - strlen($GT)) ). $GT;
                echo '<tr><td>'. $titleGT. $GT.'</td></tr>';

                //Bayar
                $titlePy = 'BAYAR';
                $titlePy = $titlePy. str_repeat("&nbsp;", ( 15 - strlen($titlePy)) );
                $Py      = Rupiah($d->pay, 2);
                $Py      = str_repeat("&nbsp;", ( 23 - strlen($Py)) ). $Py;
                echo '<tr><td>'. $titlePy. $Py.'</td></tr>';

                $kembali= $d->payment_type == 'Angsuran' ? 0 : $d->pay - $d->grand_total;
                //Kembali
                $titleK = 'KEMBALI';
                $titleK = $titleK. str_repeat("&nbsp;", ( 15 - strlen($titleK)) );
                $Kb     = Rupiah(($kembali), 2);
                $Kb      = str_repeat("&nbsp;", ( 23 - strlen($Kb)) ). $Kb;
                echo '<tr><td>'. $titleK. $Kb.'</td></tr>';
                echo '<tr><td>&nbsp;</td></tr>';

            }
            echo '</table>';

            $footer = 'Terima kasih atas kunjungan anda';
            $starSpace = ( 32 - strlen($footer) ) / 2;
            $starFooter = str_repeat('*', $starSpace+1);
            echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/><br/><br/><br/>");
            echo '<p>&nbsp;</p>';

        ?>
        </section>

    </body>
</html>
