<?php


function fl_acf_repeater_colors() {
   echo '<style type="text/css">
        /* Row Number */
        .acf-table .acf-row .acf-row-handle.order {
          color: #000;
          font-size: 20px;
          text-shadow: none;
        }
        /* nth field background */
        .acf-table .acf-row:nth-of-type(2n) .acf-fields.-left > .acf-field:before {
          background: #ccc;
        }

        .acf-table .acf-row:nth-of-type(2n) .acf-row-handle.order {
          background-color: #ccc;
        }
        .acf-table .acf-row:nth-of-type(2n) .acf-input {
          background-color: #ccc;
        }
        .acf-table .acf-row:nth-of-type(2n) .acf-field {
          background-color: #ccc;
        }

        .acf-table .acf-row .fl_row_bg_color li {
          margin-bottom: 10px;
          overflow: hidden;
        }

        .acf-table .acf-row .fl_row_bg_color .acf-radio-list label {
          position: relative;
          z-index: 4;
          padding: 5px 15px 5px 10px;
          color: transparent;
        }

        .acf-table .acf-row .fl_row_bg_color .acf-radio-list li:first-child label {
          color: initial;
        }

        .acf-table .acf-row .fl_row_bg_color input {
          margin-right: 10px;
        }

        .acf-table .acf-row .fl_row_bg_color input:after {
          position: absolute;
          content: "";
          left: 0;
          right: -1000%;
          top: 0;
          bottom: 0;
          z-index: -1;
        }
        
        .fl_row_bg_color input[value="t-theme--none"]:after {
          background: #ffffff;
        }
        .fl_row_bg_color input[value="t-theme--blue"]:after {
          background: #354b54;
        }
        .fl_row_bg_color input[value="t-theme--lightBlue"]:after {
          background: #6995a7;
        }
        .fl_row_bg_color input[value="t-theme--grey"]:after {
          background: #f9f8f8;
        }
        


         </style>';
}

add_action('admin_head', 'fl_acf_repeater_colors');
