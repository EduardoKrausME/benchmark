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
 * Declare all tests for the benchmark
 *
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * HOW TO CREATE A TEST
 *
 * Create a public static function in this class (benchmark_test).
 * The function doesn't need to be declared elsewhere because it is automaticly loaded by the main class "benchmark".
 *
 * Structure :
 *
 *      public static function the_function_name() {
 *          echo 'foo';
 *          return array('limit' => .5, 'over' => .8, 'fail' => BENCHFAIL_BLABLABLA);
 *      }
 *
 * 1) The function must return an array with attributes :
 *      (float)  limit: Time limit too high but acceptable (orange)
 *      (float)  over : Over time, the benchmark fail (red)
 *      (define) fail : To display the good text if the test fail
 *
 * 2) The function must have strings in language file "/lang/xy/report_benchmark.php"
 *
 * If you create more test, please send it to the community
 *
 *
 *
 */


/**
 * BenchMark Test
 */

// Define to join the language pack
define ( 'BENCHFAIL_SLOWSERVER', 'slowserver' );
define ( 'BENCHFAIL_SLOWPROCESSOR', 'slowprocessor' );
define ( 'BENCHFAIL_SLOWHARDDRIVE', 'slowharddrive' );

/**
 * Tests for the BenchMark report
 *
 */
class report_benchmark_test extends report_benchmark
{

    /**
     * Function called many times
     *
     * @return array Contains the test results
     */
    public static function processor ()
    {

        $pass = 10000000;
        for ( $i = 0; $i < $pass; ++$i )
            ;
        $i = 0;
        while ( $i < $pass ) {
            ++$i;
        }

        return array( 'limit' => .5, 'over' => .8, 'fail' => BENCHFAIL_SLOWPROCESSOR );

    }

    /**
     * Reading files in the Moodle's temporary folder
     *
     * @return array Contains the test results
     */
    public static function fileread ()
    {
        global $CFG;

        file_put_contents ( $CFG->tempdir . '/benchmark.temp', 'benchmark' );
        $i    = 0;
        $pass = 10000;
        while ( $i < $pass ) {
            ++$i;
            file_get_contents ( $CFG->tempdir . '/benchmark.temp' );
        }
        @unlink ( $CFG->tempdir . '/benchmark.temp' );

        return array( 'limit' => .1, 'over' => .3, 'fail' => BENCHFAIL_SLOWHARDDRIVE );

    }

    /**
     * Creating files in the Moodle's temporary folder
     *
     * @return array Contains the test results
     */
    public static function filewrite ()
    {
        global $CFG;

        $lorem      = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus felis, dignissim quis nisl sit amet, blandit suscipit lacus. Duis maximus, urna sed fringilla consequat, tellus ex sollicitudin ante, vitae posuere neque purus nec justo. Donec porta ipsum sed urna tempus, sit amet dictum lorem euismod. Phasellus vel erat a libero aliquet venenatis. Phasellus condimentum venenatis risus ut egestas. Morbi sit amet posuere orci, id tempor dui. Vestibulum eget sapien eget mauris eleifend ullamcorper. In finibus mauris id augue fermentum porta. Fusce dictum vestibulum justo eget malesuada. Nullam at tincidunt urna, nec ultrices velit. Nunc eget augue velit. Mauris sed rhoncus purus. Etiam aliquam urna ac nisl tristique, vitae tristique urna tincidunt. Vestibulum luctus nulla magna, non tristique risus rhoncus nec. Vestibulum vestibulum, nulla scelerisque congue molestie, dolor risus hendrerit velit, non malesuada nisi orci eget eros. Aenean interdum ut lectus quis semper. Curabitur viverra vitae augue id.';
        $loremipsum = str_repeat ( $lorem, 16 );
        $i          = 0;
        $pass       = 2000;
        while ( $i < $pass ) {
            ++$i;
            file_put_contents ( $CFG->tempdir . '/benchmark.temp', $loremipsum );
        }
        @unlink ( $CFG->tempdir . '/benchmark.temp' );

        return array( 'limit' => 1, 'over' => 1.25, 'fail' => BENCHFAIL_SLOWHARDDRIVE );

    }



}
