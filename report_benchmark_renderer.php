<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * HTML rendering methods are defined here
 *
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * Overview benchmark renderer
 */
class report_benchmark_renderer
{

    /**
     * Disclamer
     *
     * @return string First page, disclamer
     * @throws coding_exception
     */
    public function launcher ()
    {
        $out = html_writer::start_div ( 'text-center' );

        $out .= html_writer::tag ( 'h1', get_string ( 'adminreport' ) );

        // Welcome message
        $out .= html_writer::tag ( 'p', get_string ( 'info' ) );
        $out .= html_writer::tag ( 'p', get_string ( 'infoaverage' ) );
        $out .= html_writer::tag ( 'p', get_string ( 'infodisclamer' ) );

        $out .= html_writer::tag ( 'p', 'Código em <a href="https://github.com/EduardoKrausME/benchmark" target="_blank">https://github.com/EduardoKrausME/benchmark</a> baeado em <a href="https://github.com/mikasmart/benchmark" target="_blank">https://github.com/mikasmart/benchmark</a>' );

        // Button to start the test
        $out .= html_writer::start_div ( 'continuebutton' );

        $out .= '<a href="?step=rum" class="btn btn-primary">' . get_string ( 'start' ) . '</a>';
        $out .= html_writer::end_div ();

        $out .= html_writer::end_div ();

        return $out;
    }

    /**
     * Display the result
     *
     * @return string Display all data and score
     * @throws coding_exception
     */
    public function display ()
    {

        // Load the BenchMark Class
        $bench = new report_benchmark();

        // Header
        $out = html_writer::tag ( 'h1', get_string ( 'adminreport' ), 'text-center' );
        $out .= html_writer::start_div ( null, array( 'id' => 'benchmark' ) );

        // Header string table
        $strdesc   = get_string ( 'description' );
        $strduring = get_string ( 'during' );
        $strlimit  = get_string ( 'limit' );
        $strover   = get_string ( 'over' );

        // Get BenchMark data
        $results = $bench->get_results ();
        $totals  = $bench->get_total ();

        // Display the big header score
        $out .= html_writer::start_div ( 'text-center' );

        $out .= html_writer::start_tag ( 'h3' );
        $out .= get_string ( 'scoremsg' );

        $out .= html_writer::start_tag ( 'span' );
        $out .= number_format ( $totals[ 'total' ], 3, ',', '' ) . " segundos";

        $out .= html_writer::end_tag ( 'span' );
        $out .= html_writer::end_tag ( 'h3' );

        $out .= html_writer::end_div ();

        $out
            .= "<table id='benchmarkresult' class='table table-bordered'>
                    <tr>
                        <th>#</th>
                        <th>$strdesc</th>
                        <th>$strduring</th>
                        <th>$strlimit</th>
                        <th>$strover</th>
                    </tr>";


        foreach ( $results as $result ) {

            $out
                .= "
                    <tr>
                        <td class=text-center>{$result[ 'id' ]}</td>
                        <td>
                            <div>{$result[ 'name' ]}</div>
                            <small>{$result[ 'info' ]}</small>
                        </td>
                        <td class='{$result['class']} text-center'>" . number_format ( $result[ 'during' ], 3, ',', '' ) . "</td>
                        <td class=text-center>{$result[ 'limit' ]}</td>
                        <td class=text-center>{$result[ 'over' ]}</td>
                    </tr>";
        }
        $out
            .= "
                    <tr class='footer'>
                        <td colspan=2 class=text-right>" . get_string ( 'total' ) . "</td>
                        <td class=text-center>" . number_format ( $totals[ 'total' ], 3, ',', '' ) . " Seg</td>
                        <td colspan=2>&nbsp;</td>
                    </tr>";

        $out .= html_writer::end_tag ( 'table' );

        // Contruct and return the fail array without duplicate values
        $fails = array();
        foreach ( $results as $result ) {
            if ( $result[ 'during' ] >= $result[ 'limit' ] ) {
                $fails[] = $result[ 'fail' ];
            }
        }
        $fails = array_unique ( $fails );

        // Display the tips
        $tips = null;
        foreach ( $fails as $fail ) {
            $tips .= html_writer::start_tag ( 'h5', null );
            $tips .= get_string ( $fail . 'label' );
            $tips .= html_writer::end_tag ( 'h5' );
            $tips .= get_string ( $fail . 'solution' );
        }

        // Display the share and redo button
        $out .= html_writer::start_div ( 'text-center' );

        $out .= '<a href="?" class="btn btn-primary">' . get_string ( 'redo' ) . '</a>';

        $out .= html_writer::end_div ();

        // Footer
        $out .= html_writer::end_div ();

        return $out;

    }

}