@extends('seller.layouts.app')

@section('panel_content')
    @push('style')
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('new/assets/plugins/fontawesome/css/all.min.css')}}">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/select2/css/select2.min.css')}}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">

        <link rel="stylesheet" href="{{asset('new/assets/plugins/dropzone/dropzone.min.css')}}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('new/assets/css/doctor-profile.css')}}">
        <style>
            /*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Template
Version      : 1.0
*/

/*============================
 [Table of CSS]

1. General
2. Table
3. Bootstrap Classes
4. Avatar
5. Select2
6. Nav Tabs
7. Modal
8. Components
9. Slick Slider
10. Focus Label
11. Header
12. Mobile Menu
13. Footer
14. Login
15. Home
16. Search
17. Doctor Profile
18. Booking
19. Checkout
20. Booking Success
21. Invoice View
22. Schedule Timings
23. Doctor Dashboard
24. Patient Profile
25. Add Billing
26. Chat
27. Doctor Profile Settings
28. Calendar
29. Patient Dashboard
30. Profile Settings
31. Appoitment List
32. Reviews
33. Voice call
34. Video Call
35. Outgoing Call
36. Incoming Call
37. Terms and Conditions
38. Responsive

========================================*/

/*-----------------
	1. General
-----------------------*/

@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900');
@font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: url(../fonts/MaterialIcons-Regular.eot); /* For IE6-8 */
    src: local('Material Icons'),
    local('MaterialIcons-Regular'),
    url(../fonts/MaterialIcons-Regular.html) format('woff2'),
    url(../fonts/MaterialIcons-Regular.woff) format('woff'),
    url(../fonts/MaterialIcons-Regular.ttf) format('truetype');
}
.material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    display: inline-block;
    line-height: 1;
    text-transform: none;
    letter-spacing: normal;
    word-wrap: normal;
    white-space: nowrap;
    direction: ltr;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
    font-feature-settings: 'liga';
}

html {
    height: 100%;
}
body {
    background-color: #f8f9fa;
    color: #272b41;
    font-family: "Poppins",sans-serif;
    font-size: 0.9375rem;
    height: 100%;
    overflow-x: hidden;
}
h1, h2, h3, h4, h5, h6 {
    color: #272b41;
    font-weight: 500;
}
.h1, h1 {
    font-size: 2.25rem;
}
.h2, h2 {
    font-size: 1.875rem;
}
.h3, h3 {
    font-size: 1.5rem;
}
.h4, h4 {
    font-size: 1.125rem;
}
.h5, h5 {
    font-size: 1rem;
}
.h6, h6 {
    font-size: 0.875rem;
}

a {
    color: #2E3842;
}
a:hover {
    color: #09dca4;
}
a:hover,
a:active,
a:focus {
    outline: none;
    text-decoration: none;
}
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
}
input,
button,
a {
    transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
}
button:focus {
    outline: 0;
}
input[type=text],
input[type=password] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.btn.focus, .btn:focus {
    box-shadow: inherit;
}
.form-control {
    border-color: #dcdcdc;
    color: #333;
    font-size: 15px;
    min-height: 46px;
    padding: 6px 15px;
}
.table .form-control {
    font-size: 14px;
    min-height: 38px;
}
.container-fluid {
    padding-left: 30px;
    padding-right: 30px;
}
.form-control::-webkit-input-placeholder {
    color: #858585;
    font-size: 14px;
}
.form-control::-moz-placeholder {
    color: #858585;
    font-size: 14px;
}
.form-control:-ms-input-placeholder {
    color: #858585;
    font-size: 14px;
}
.form-control::-ms-input-placeholder {
    color: #858585;
    font-size: 14px;
}
.form-control::placeholder {
    color: #858585;
    font-size: 14px;
}
.list-group-item {
    border: 1px solid #f0f0f0;
}
.content {
    min-height: 200px;
    padding: 30px 0 0;
}

/*-----------------
	2. Table
-----------------------*/

.table {
    color: #272b41;
    max-width: 100%;
    margin-bottom: 0;
    width: 100%;
}
.table-striped > tbody > tr:nth-of-type(2n+1) {
    background-color: #f8f9fa;
}
.table.no-border > tbody > tr > td,
.table > tbody > tr > th,
.table.no-border > tfoot > tr > td,
.table.no-border > tfoot > tr > th,
.table.no-border > thead > tr > td,
.table.no-border > thead > tr > th {
    border-top: 0;
    padding: 10px 8px;
}
.table-nowrap td,
.table-nowrap th {
    white-space: nowrap
}
.table.dataTable {
    border-collapse: collapse !important;
}
table.table td h2 {
    display: inline-block;
    font-size: inherit;
    font-weight: 400;
    margin: 0;
    padding: 0;
    vertical-align: middle;
}
table.table td h2.table-avatar {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    font-size: inherit;
    font-weight: 400;
    margin: 0;
    padding: 0;
    vertical-align: middle;
    white-space: nowrap;
}
table.table td h2 a {
    color: #272b41;
}
table.table td h2 a:hover {
    color: #09dca4;
}
table.table td h2 span {
    color: #888;
    display: block;
    font-size: 12px;
    margin-top: 3px;
}
.table thead {
    border-bottom: 1px solid rgba(0, 0, 0, 0.03);
}
.table thead tr th {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.table tbody tr {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.table tbody tr:last-child {
    border-color: transparent;
}
.table.table-center td,
.table.table-center th {
    vertical-align: middle;
}
.table-hover tbody tr:hover {
    background-color: #f7f7f7;
}
.table-hover tbody tr:hover td {
    color: #474648;
}
.table-striped thead tr {
    border-color: transparent;
}
.table-striped tbody tr {
    border-color: transparent;
}
.table-striped tbody tr:nth-of-type(even) {
    background-color: rgba(255, 255, 255, 0.3);
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(235, 235, 235, 0.4);
}
.table-bordered {
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
}
.table-bordered th,
.table-bordered td {
    border-color: rgba(0, 0, 0, 0.05);
}
.card-table .card-body {
    padding: 0;
}
.card-table .card-body .table > thead > tr > th {
    border-top: 0;
}
.card-table .table tr td:first-child,
.card-table .table tr th:first-child {
    padding-left: 1.5rem;
}
.card-table .table tr td:last-child,
.card-table .table tr th:last-child {
    padding-right: 1.5rem;
}
.card-table .table td, .card-table .table th {
    border-top: 1px solid #e2e5e8;
    padding: 1rem 0.75rem;
    white-space: nowrap;
}

/*-----------------
	3. Bootstrap Classes
-----------------------*/

.btn.focus, .btn:focus {
    box-shadow: unset;
}
.btn-white {
    background-color: #fff;
    border: 1px solid #ccc;
    color: #272b41;
}
.btn.btn-rounded {
    border-radius: 50px;
}
.bg-primary,
.badge-primary {
    background-color: #09e5ab !important;
}
a.bg-primary:focus,
a.bg-primary:hover,
button.bg-primary:focus,
button.bg-primary:hover {
    background-color: #09dca4 !important;
}
.bg-success,
.badge-success {
    background-color: #00e65b !important;
}
a.bg-success:focus,
a.bg-success:hover,
button.bg-success:focus,
button.bg-success:hover {
    background-color: #00cc52 !important;
}
.bg-info,
.badge-info {
    background-color: #009efb !important;
}
a.bg-info:focus,
a.bg-info:hover,
button.bg-info:focus,
button.bg-info:hover {
    background-color: #028ee1 !important;
}
.bg-warning,
.badge-warning {
    background-color: #ffbc34 !important;
}
a.bg-warning:focus,
a.bg-warning:hover,
button.bg-warning:focus,
button.bg-warning:hover {
    background-color: #e9ab2e !important;
}
.bg-danger,
.badge-danger {
    background-color: #ff0100 !important;
}
a.bg-danger:focus,
a.bg-danger:hover,
button.bg-danger:focus,
button.bg-danger:hover {
    background-color: #e63333 !important;
}
.bg-white {
    background-color: #fff;
}
.bg-purple,
.badge-purple {
    background-color: #9368e9 !important;
}
.text-primary,
.dropdown-menu > li > a.text-primary {
    color: #09e5ab !important;
}
.text-success,
.dropdown-menu > li > a.text-success {
    color: #00cc52 !important;
}
.text-danger,
.dropdown-menu > li > a.text-danger {
    color: #ff0100 !important;
}
.text-info,
.dropdown-menu > li > a.text-info {
    color: #009efb !important;
}
.text-warning,
.dropdown-menu > li > a.text-warning {
    color: #ffbc34 !important;
}
.text-purple,
.dropdown-menu > li > a.text-purple {
    color: #7460ee !important;
}
.text-muted {
    color: #757575 !important;
}
.btn-primary {
    background-color: #09e5ab;
    border: 1px solid #09e5ab;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary.active,
.btn-primary:active,
.open > .dropdown-toggle.btn-primary {
    background-color: #09dca4;
    border: 1px solid #09dca4;
}
.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary.focus:active,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open > .dropdown-toggle.btn-primary.focus,
.open > .dropdown-toggle.btn-primary:focus,
.open > .dropdown-toggle.btn-primary:hover {
    background-color: #09dca4;
    border: 1px solid #09dca4;
}
.btn-primary.active:not(:disabled):not(.disabled),
.btn-primary:active:not(:disabled):not(.disabled),
.show > .btn-primary.dropdown-toggle {
    background-color: #09dca4;
    border-color: #09dca4;
    color: #fff;
}
.btn-primary.active:focus:not(:disabled):not(.disabled),
.btn-primary:active:focus:not(:disabled):not(.disabled),
.show > .btn-primary.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-primary.disabled, .btn-primary:disabled {
    background-color: #09e5ab;
    border-color: #09e5ab;
    color: #fff;
}
.btn-secondary.active:focus:not(:disabled):not(.disabled),
.btn-secondary:active:focus:not(:disabled):not(.disabled),
.show > .btn-secondary.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-success {
    background-color: #00e65b;
    border: 1px solid #00e65b
}
.btn-success:hover,
.btn-success:focus,
.btn-success.active,
.btn-success:active,
.open > .dropdown-toggle.btn-success {
    background-color: #00cc52;
    border: 1px solid #00cc52;
    color: #fff;
}
.btn-success.active.focus,
.btn-success.active:focus,
.btn-success.active:hover,
.btn-success.focus:active,
.btn-success:active:focus,
.btn-success:active:hover,
.open > .dropdown-toggle.btn-success.focus,
.open > .dropdown-toggle.btn-success:focus,
.open > .dropdown-toggle.btn-success:hover {
    background-color: #00cc52;
    border: 1px solid #00cc52
}
.btn-success.active:not(:disabled):not(.disabled),
.btn-success:active:not(:disabled):not(.disabled),
.show > .btn-success.dropdown-toggle {
    background-color: #00cc52;
    border-color: #00cc52;
    color: #fff;
}
.btn-success.active:focus:not(:disabled):not(.disabled),
.btn-success:active:focus:not(:disabled):not(.disabled),
.show > .btn-success.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-success.disabled, .btn-success:disabled {
    background-color: #00e65b;
    border-color: #00e65b;
    color: #fff;
}
.btn-info {
    background-color: #009efb;
    border: 1px solid #009efb
}
.btn-info:hover,
.btn-info:focus,
.btn-info.active,
.btn-info:active,
.open > .dropdown-toggle.btn-info {
    background-color: #028ee1;
    border: 1px solid #028ee1
}
.btn-info.active.focus,
.btn-info.active:focus,
.btn-info.active:hover,
.btn-info.focus:active,
.btn-info:active:focus,
.btn-info:active:hover,
.open > .dropdown-toggle.btn-info.focus,
.open > .dropdown-toggle.btn-info:focus,
.open > .dropdown-toggle.btn-info:hover {
    background-color: #028ee1;
    border: 1px solid #028ee1
}
.btn-info.active:not(:disabled):not(.disabled),
.btn-info:active:not(:disabled):not(.disabled),
.show > .btn-info.dropdown-toggle {
    background-color: #028ee1;
    border-color: #028ee1;
    color: #fff;
}
.btn-info.active:focus:not(:disabled):not(.disabled),
.btn-info:active:focus:not(:disabled):not(.disabled),
.show > .btn-info.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-info.disabled, .btn-info:disabled {
    background-color: #009efb;
    border-color: #009efb;
    color: #fff;
}
.btn-warning {
    background-color: #ffbc34;
    border: 1px solid #ffbc34
}
.btn-warning:hover,
.btn-warning:focus,
.btn-warning.active,
.btn-warning:active,
.open > .dropdown-toggle.btn-warning {
    background-color: #e9ab2e;
    border: 1px solid #e9ab2e
}
.btn-warning.active.focus,
.btn-warning.active:focus,
.btn-warning.active:hover,
.btn-warning.focus:active,
.btn-warning:active:focus,
.btn-warning:active:hover,
.open > .dropdown-toggle.btn-warning.focus,
.open > .dropdown-toggle.btn-warning:focus,
.open > .dropdown-toggle.btn-warning:hover {
    background-color: #e9ab2e;
    border: 1px solid #e9ab2e
}
.btn-warning.active:not(:disabled):not(.disabled),
.btn-warning:active:not(:disabled):not(.disabled),
.show > .btn-warning.dropdown-toggle {
    background-color: #e9ab2e;
    border-color: #e9ab2e;
    color: #fff;
}
.btn-warning.active:focus:not(:disabled):not(.disabled),
.btn-warning:active:focus:not(:disabled):not(.disabled),
.show > .btn-warning.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-warning.disabled, .btn-warning:disabled {
    background-color: #ffbc34;
    border-color: #ffbc34;
    color: #fff;
}
.btn-danger {
    background-color: #ff0100;
    border: 1px solid #ff0100;
}
.btn-danger:hover,
.btn-danger:focus,
.btn-danger.active,
.btn-danger:active,
.open > .dropdown-toggle.btn-danger {
    background-color: #e63333;
    border: 1px solid #e63333;
}
.btn-danger.active.focus,
.btn-danger.active:focus,
.btn-danger.active:hover,
.btn-danger.focus:active,
.btn-danger:active:focus,
.btn-danger:active:hover,
.open > .dropdown-toggle.btn-danger.focus,
.open > .dropdown-toggle.btn-danger:focus,
.open > .dropdown-toggle.btn-danger:hover {
    background-color: #e63333;
    border: 1px solid #e63333;
}
.btn-danger.active:not(:disabled):not(.disabled),
.btn-danger:active:not(:disabled):not(.disabled),
.show > .btn-danger.dropdown-toggle {
    background-color: #e63333;
    border-color: #e63333;
    color: #fff;
}
.btn-danger.active:focus:not(:disabled):not(.disabled),
.btn-danger:active:focus:not(:disabled):not(.disabled),
.show > .btn-danger.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-danger.disabled, .btn-danger:disabled {
    background-color: #f62d51;
    border-color: #f62d51;
    color: #fff;
}
.btn-light.active:focus:not(:disabled):not(.disabled),
.btn-light:active:focus:not(:disabled):not(.disabled),
.show > .btn-light.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-dark.active:focus:not(:disabled):not(.disabled),
.btn-dark:active:focus:not(:disabled):not(.disabled),
.show > .btn-dark.dropdown-toggle:focus {
    box-shadow: unset;
}
.btn-outline-primary {
    color: #09e5ab;
    border-color: #09e5ab;
}
.btn-outline-primary:hover {
    background-color: #09e5ab;
    border-color: #09e5ab;
}
.btn-outline-primary:focus,
.btn-outline-primary.focus {
    box-shadow: none;
}
.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
    color: #09e5ab;
    background-color: transparent;
}
.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle {
    background-color: #09e5ab;
    border-color: #09e5ab;
}
.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-primary.dropdown-toggle:focus {
    box-shadow: none;
}
.btn-outline-success {
    color: #00e65b;
    border-color: #00e65b;
}
.btn-outline-success:hover {
    background-color: #00e65b;
    border-color: #00e65b;
}
.btn-outline-success:focus, .btn-outline-success.focus {
    box-shadow: none;
}
.btn-outline-success.disabled, .btn-outline-success:disabled {
    color: #00e65b;
    background-color: transparent;
}
.btn-outline-success:not(:disabled):not(.disabled):active,
.btn-outline-success:not(:disabled):not(.disabled).active,
.show > .btn-outline-success.dropdown-toggle {
    background-color: #00e65b;
    border-color: #00e65b;
}
.btn-outline-success:not(:disabled):not(.disabled):active:focus,
.btn-outline-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-success.dropdown-toggle:focus {
    box-shadow: none;
}
.btn-outline-info {
    color: #009efb;
    border-color: #009efb;
}
.btn-outline-info:hover {
    color: #fff;
    background-color: #009efb;
    border-color: #009efb;
}
.btn-outline-info:focus, .btn-outline-info.focus {
    box-shadow: none;
}
.btn-outline-info.disabled, .btn-outline-info:disabled {
    background-color: transparent;
    color: #009efb;
}
.btn-outline-info:not(:disabled):not(.disabled):active,
.btn-outline-info:not(:disabled):not(.disabled).active,
.show > .btn-outline-info.dropdown-toggle {
    background-color: #009efb;
    border-color: #009efb;
}
.btn-outline-info:not(:disabled):not(.disabled):active:focus,
.btn-outline-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-info.dropdown-toggle:focus {
    box-shadow: none;
}
.btn-outline-warning {
    color: #ffbc34;
    border-color: #ffbc34;
}
.btn-outline-warning:hover {
    color: #212529;
    background-color: #ffbc34;
    border-color: #ffbc34;
}
.btn-outline-warning:focus, .btn-outline-warning.focus {
    box-shadow: none;
}
.btn-outline-warning.disabled, .btn-outline-warning:disabled {
    background-color: transparent;
    color: #ffbc34;
}
.btn-outline-warning:not(:disabled):not(.disabled):active,
.btn-outline-warning:not(:disabled):not(.disabled).active,
.show > .btn-outline-warning.dropdown-toggle {
    color: #212529;
    background-color: #ffbc34;
    border-color: #ffbc34;
}
.btn-outline-warning:not(:disabled):not(.disabled):active:focus,
.btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-warning.dropdown-toggle:focus {
    box-shadow: none;
}
.btn-outline-danger {
    color: #ff0100;
    border-color: #ff0100;
}
.btn-outline-danger:hover {
    color: #fff;
    background-color: #ff0100;
    border-color: #ff0100;
}
.btn-outline-danger:focus, .btn-outline-danger.focus {
    box-shadow: none;
}
.btn-outline-danger.disabled, .btn-outline-danger:disabled {
    background-color: transparent;
    color: #ff0100;
}
.btn-outline-danger:not(:disabled):not(.disabled):active,
.btn-outline-danger:not(:disabled):not(.disabled).active,
.show > .btn-outline-danger.dropdown-toggle {
    background-color: #ff0100;
    border-color: #ff0100;
}
.btn-outline-danger:not(:disabled):not(.disabled):active:focus,
.btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-danger.dropdown-toggle:focus {
    box-shadow: none;
}
.btn-outline-light {
    color: #ababab;
    border-color: #e6e6e6;
}
.btn-outline-light.disabled, .btn-outline-light:disabled {
    color: #ababab;
}
.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: #20c0f3;
    border-color: #20c0f3;
}
.pagination > li > a,
.pagination > li > span {
    color: #20c0f3;
}
.page-link:hover {
    color: #20c0f3;
}
.page-link:focus {
    box-shadow: unset;
}
.page-item.active .page-link {
    background-color: #20c0f3;
    border-color: #20c0f3;
}
.dropdown-menu {
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 3px;
    box-shadow: inherit;
    font-size: 14px;
    transform-origin: left top 0;
}
.dropdown-item.active, .dropdown-item:active {
    background-color: #0de0fe;
}
.navbar-nav .open .dropdown-menu {
    border: 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}
.card {
    border: 1px solid #f0f0f0;
    margin-bottom: 1.875rem;
}
.card-body {
    padding: 1.5rem;
}
.card-title {
    margin-bottom: 15px;
}
.card-header {
    border-bottom: 1px solid #f0f0f0;
    padding: 1rem 1.5rem;
}
.card-footer {
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    padding: 1rem 1.5rem;
}
.card .card-header {
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
}
.card .card-header .card-title {
    margin-bottom: 0;
}
.btn-light {
    border-color: #e6e6e6;
    color: #a6a6a6;
}
.bootstrap-datetimepicker-widget table td.active, .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #20c0f3;
    text-shadow: unset;
}
.bootstrap-datetimepicker-widget table td.today::before{
    border-bottom-color: #20c0f3;
}
.bg-info-light {
    background-color: rgba(2, 182, 179,0.12) !important;
    color: #1db9aa !important;
}
.bg-primary-light {
    background-color: rgba(17, 148, 247,0.12) !important;
    color: #2196f3 !important;
}
.bg-danger-light {
    background-color: rgba(242, 17, 54,0.12) !important;
    color: #e63c3c !important;
}
.bg-warning-light {
    background-color: rgba(255, 152, 0,0.12) !important;
    color: #f39c12 !important;
}
.bg-success-light {
    background-color: rgba(15, 183, 107,0.12) !important;
    color: #26af48 !important;
}
.bg-purple-light {
    background-color: rgba(197, 128, 255,0.12) !important;
    color: #c580ff !important;
}
.bg-default-light {
    background-color: rgba(40, 52, 71,0.12) !important;
    color: #283447 !important;
}
.text-xs {
    font-size: .75rem !important;
}
.text-sm {
    font-size: .875rem !important;
}
.text-lg {
    font-size: 1.25rem !important;
}
.text-xl {
    font-size: 1.5rem !important;
}
.form-control:focus {
    border-color: #bbb;
    box-shadow: none;
    outline: 0 none;
}
.form-group {
    margin-bottom: 1.25rem;
}

/*-----------------
	4. Avatar
-----------------------*/

.avatar {
    position: relative;
    display: inline-block;
    width: 3rem;
    height: 3rem
}
.avatar > img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}
.avatar-title {
    width: 100%;
    height: 100%;
    background-color: #20c0f3;
    color: #fff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.avatar-away::before,
.avatar-offline::before,
.avatar-online::before {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 25%;
    height: 25%;
    border-radius: 50%;
    content: '';
    border: 2px solid #fff;
}
.avatar-online::before {
    background-color: #00e65b;
}
.avatar-offline::before {
    background-color: #ff0100;
}
.avatar-away::before {
    background-color: #ffbc34;
}
.avatar .border {
    border-width: 3px !important;
}
.avatar .rounded {
    border-radius: 6px !important;
}
.avatar .avatar-title {
    font-size: 18px;
}
.avatar-xs {
    width: 1.65rem;
    height: 1.65rem;
}
.avatar-xs .border {
    border-width: 2px !important;
}
.avatar-xs .rounded {
    border-radius: 4px !important;
}
.avatar-xs .avatar-title {
    font-size: 12px;
}
.avatar-xs.avatar-away::before,
.avatar-xs.avatar-offline::before,
.avatar-xs.avatar-online::before {
    border-width: 1px;
}
.avatar-sm {
    width: 2.5rem;
    height: 2.5rem;
}
.avatar-sm .border {
    border-width: 3px !important;
}
.avatar-sm .rounded {
    border-radius: 4px !important;
}
.avatar-sm .avatar-title {
    font-size: 15px;
}
.avatar-sm.avatar-away::before,
.avatar-sm.avatar-offline::before,
.avatar-sm.avatar-online::before {
    border-width: 2px;
}
.avatar-lg {
    width: 3.75rem;
    height: 3.75rem;
}
.avatar-lg .border {
    border-width: 3px !important;
}
.avatar-lg .rounded {
    border-radius: 8px !important;
}
.avatar-lg .avatar-title {
    font-size: 24px;
}
.avatar-lg.avatar-away::before,
.avatar-lg.avatar-offline::before,
.avatar-lg.avatar-online::before {
    border-width: 3px;
}
.avatar-xl {
    width: 5rem;
    height: 5rem;
}
.avatar-xl .border {
    border-width: 4px !important;
}
.avatar-xl .rounded {
    border-radius: 8px !important;
}
.avatar-xl .avatar-title {
    font-size: 28px;
}
.avatar-xl.avatar-away::before,
.avatar-xl.avatar-offline::before,
.avatar-xl.avatar-online::before {
    border-width: 4px;
}
.avatar-xxl {
    width: 5.125rem;
    height: 5.125rem;
}
.avatar-xxl .border {
    border-width: 6px !important;
}
.avatar-xxl .rounded {
    border-radius: 8px !important;
}
.avatar-xxl .avatar-title {
    font-size: 30px;
}
.avatar-xxl.avatar-away::before,
.avatar-xxl.avatar-offline::before,
.avatar-xxl.avatar-online::before {
    border-width: 4px;
}
.avatar-group {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
}
.avatar-group .avatar + .avatar {
    margin-left: -.75rem;
}
.avatar-group .avatar-xs + .avatar-xs {
    margin-left: -.40625rem;
}
.avatar-group .avatar-sm+.avatar-sm {
    margin-left: -.625rem;
}
.avatar-group .avatar-lg + .avatar-lg {
    margin-left: -1rem;
}
.avatar-group .avatar-xl + .avatar-xl {
    margin-left: -1.28125rem;
}
.avatar-group .avatar:hover {
    z-index: 1;
}

/*-----------------
	5. Select2
-----------------------*/

.select2-results__option {
    padding: 6px 15px;
}
.select2-container .select2-selection--single {
    border: 1px solid #dcdcdc;
    height: 46px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 44px;
    right: 7px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #dcdcdc transparent transparent;
    border-style: solid;
    border-width: 6px 6px 0;
    height: 0;
    left: 50%;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
    top: 50%;
    width: 0;
}
.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent #dcdcdc;
    border-width: 0 6px 6px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 30px;
    padding-left: 15px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #272b41;
    font-size: 15px;
    font-weight: normal;
    line-height: 44px;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #20c0f3;
}
.select2-container--default .select2-selection--multiple {
    border: 1px solid #dcdcdc;
    min-height: 46px;
}
.select2-dropdown {
    border-color: #dcdcdc;
}

/*-----------------
	6. Nav Tabs
-----------------------*/

.nav-tabs {
    border-bottom: 1px solid #f0f0f0;
}
.card-header-tabs {
    border-bottom: 0;
}
.nav-tabs > li > a {
    margin-right: 0;
    color: #888;
    border-radius: 0;
}
.nav-tabs > li > a:hover,
.nav-tabs > li > a:focus {
    border-color: transparent;
    color: #272b41;
}
.nav-tabs.nav-tabs-solid > li > a {
    color: #272b41;
}
.nav-tabs.nav-tabs-solid > .active > a,
.nav-tabs.nav-tabs-solid > .active > a:hover,
.nav-tabs.nav-tabs-solid > .active > a:focus {
    background-color: #20c0f3;
    border-color: #20c0f3;
    color: #fff;
}
.tab-content {
    padding-top: 20px;
}
.nav-tabs .nav-link {
    border-radius: 0;
}
.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
    background-color: #eee;
    border-color: transparent;
    color: #272b41;
}
.nav-tabs.nav-justified > li > a {
    border-radius: 0;
    margin-bottom: 0;
}
.nav-tabs.nav-justified > li > a:hover,
.nav-tabs.nav-justified > li > a:focus {
    border-bottom-color: #ddd;
}
.nav-tabs.nav-justified.nav-tabs-solid > li > a {
    border-color: transparent;
}
.nav-tabs.nav-tabs-solid > li > a {
    color: #272b41;
}
.nav-tabs.nav-tabs-solid > li > a.active,
.nav-tabs.nav-tabs-solid > li > a.active:hover,
.nav-tabs.nav-tabs-solid > li > a.active:focus {
    background-color: #20c0f3;
    border-color: #20c0f3;
    color: #fff;
}
.nav-tabs.nav-tabs-solid.nav-tabs-rounded {
    border-radius: 50px;
}
.nav-tabs.nav-tabs-solid.nav-tabs-rounded > li > a {
    border-radius: 50px;
}
.nav-tabs.nav-tabs-solid.nav-tabs-rounded > li > a.active,
.nav-tabs.nav-tabs-solid.nav-tabs-rounded > li > a.active:hover,
.nav-tabs.nav-tabs-solid.nav-tabs-rounded > li > a.active:focus {
    border-radius: 50px;
}
.nav-tabs-justified > li > a {
    border-radius: 0;
    margin-bottom: 0;
}
.nav-tabs-justified > li > a:hover,
.nav-tabs-justified > li > a:focus {
    border-bottom-color: #ddd;
}
.nav-tabs-justified.nav-tabs-solid > li > a {
    border-color: transparent;
}
.nav-tabs.nav-justified.nav-tabs-top {
    border-bottom: 1px solid #ddd;
}
.nav-tabs.nav-justified.nav-tabs-top > li > a,
.nav-tabs.nav-justified.nav-tabs-top > li > a:hover,
.nav-tabs.nav-justified.nav-tabs-top > li > a:focus {
    border-width: 2px 0 0 0;
}
.nav-tabs.nav-tabs-top > li {
    margin-bottom: 0;
}
.nav-tabs.nav-tabs-top > li > a,
.nav-tabs.nav-tabs-top > li > a:hover,
.nav-tabs.nav-tabs-top > li > a:focus {
    border-width: 2px 0 0 0;
}
.nav-tabs.nav-tabs-top > li.open > a,
.nav-tabs.nav-tabs-top > li > a:hover,
.nav-tabs.nav-tabs-top > li > a:focus {
    border-top-color: #ddd;
}
.nav-tabs.nav-tabs-top > li+li > a {
    margin-left: 1px;
}
.nav-tabs.nav-tabs-top > li > a.active,
.nav-tabs.nav-tabs-top > li > a.active:hover,
.nav-tabs.nav-tabs-top > li > a.active:focus {
    border-top-color: #20c0f3;
}
.nav-tabs.nav-tabs-bottom > li > a.active,
.nav-tabs.nav-tabs-bottom > li > a.active:hover,
.nav-tabs.nav-tabs-bottom > li > a.active:focus {
    border-bottom-width: 2px;
    border-color: transparent;
    border-bottom-color: #20c0f3;
    background-color: transparent;
    transition: none 0s ease 0s;
    -moz-transition: none 0s ease 0s;
    -o-transition: none 0s ease 0s;
    -ms-transition: none 0s ease 0s;
    -webkit-transition: none 0s ease 0s;
}
.nav-tabs.nav-tabs-solid {
    background-color: #fafafa;
    border: 0;
}
.nav-tabs.nav-tabs-solid > li {
    margin-bottom: 0;
}
.nav-tabs.nav-tabs-solid > li > a {
    border-color: transparent;
}
.nav-tabs.nav-tabs-solid > li > a:hover,
.nav-tabs.nav-tabs-solid > li > a:focus {
    background-color: #f5f5f5;
}
.nav-tabs.nav-tabs-solid > .open:not(.active) > a {
    background-color: #f5f5f5;
    border-color: transparent;
}
.nav-tabs-justified.nav-tabs-top {
    border-bottom: 1px solid #ddd;
}
.nav-tabs-justified.nav-tabs-top > li > a,
.nav-tabs-justified.nav-tabs-top > li > a:hover,
.nav-tabs-justified.nav-tabs-top > li > a:focus {
    border-width: 2px 0 0 0;
}

/*-----------------
	7. Modal
-----------------------*/

.modal {
    -webkit-overflow-scrolling: touch;
}
.modal-footer.text-center {
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.modal-footer.text-left {
    justify-content: flex-start;
    -webkit-justify-content: flex-start;
    -ms-flex-pack: flex-start;
}
.modal-dialog.modal-md {
    max-width: 600px;
}
.custom-modal .modal-content {
    border: 0;
    border-radius: 10px;
}
.custom-modal .modal-header {
    padding: 1.25rem;
}
.custom-modal .modal-footer {
    padding: 1.25rem;
}
.custom-modal .modal-body {
    padding: 1.25rem;
}
.custom-modal .close {
    background-color: #a0a0a0;
    border-radius: 50%;
    color: #fff;
    font-size: 17px;
    height: 20px;
    line-height: 20px;
    margin: 0;
    opacity: 1;
    padding: 0;
    position: absolute;
    right: 20px;
    top: 26px;
    width: 20px;
    z-index: 99;
}
.custom-modal .modal-title {
    font-size: 20px;
}
.modal-backdrop.show {
    opacity: 0.4;
    -webkit-transition-duration: 400ms;
    transition-duration: 400ms;
}
.modal .card {
    box-shadow: unset;
}

/*-----------------
	8. Components
-----------------------*/

.comp-header {
    margin-bottom: 1.875rem;
}
.comp-header .comp-title {
    color: #272b41;
}
.line {
    background-color: #20c0f3;
    height: 2px;
    margin: 0;
    width: 60px;
}
.comp-buttons .btn {
    margin-bottom: 5px;
}
.pagination-box .pagination {
    margin-top: 0;
}
.comp-dropdowns .btn-group {
    margin-bottom: 5px;
}
.progress-example .progress {
    margin-bottom: 1.5rem;
}
.progress-xs {
    height: 4px;
}
.progress-sm {
    height: 15px;
}
.progress.progress-sm {
    height: 6px;
}
.progress.progress-md {
    height: 8px;
}
.progress.progress-lg {
    height: 18px;
}

/*-----------------
	9. Slick Slider
-----------------------*/

.slick-slider {
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}
.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus {
    outline: none;
}
.slick-list.dragging {
    cursor: pointer;
}
.slick-slider .slick-track,
.slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}
.slick-track {
    position: relative;
    top: 0;
    left: 0;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-track:before,
.slick-track:after {
    display: table;
    content: '';
}
.slick-track:after {
    clear: both;
}
.slick-loading .slick-track {
    visibility: hidden;
}
.slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide {
    float: right;
}
.slick-slide img {
    display: block;
}
.slick-slide.slick-loading img {
    display: none;
}
.slick-slide.dragging img {
    pointer-events: none;
}
.slick-initialized .slick-slide {
    display: block;
}
.slick-loading .slick-slide {
    visibility: hidden;
}
.slick-vertical .slick-slide {
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
.slick-prev,
.slick-next {
    font-size: 0;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    box-shadow: 1px 6px 14px rgba(0,0,0,0.2);
    background: #fff;
    border-radius: 100%;
    cursor: pointer;
    border: none;
    outline: none;
    background: #fff;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus {
    background-color: #0de0fe;
    color: #fff;
    opacity: 1;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before {
    color: #fff;
    opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before {
    opacity: .25;
}
.slick-prev:before,
.slick-next:before {
    font-family: 'slick';
    font-size: 20px;
    line-height: 1;
    opacity: .75;
    color: #383838;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-prev {
    left: 0;
    z-index:1;
}
[dir='rtl'] .slick-prev {
    right: -25px;
    left: auto;
}
.slick-prev:before {
    content: 'â†';
}
[dir='rtl'] .slick-prev:before {
    content: 'â†’';
}
.slick-next {
    right: 0;
}
[dir='rtl'] .slick-next {
    right: auto;
    left: -25px;
}
.slick-next:before {
    content: 'â†’';
}
[dir='rtl'] .slick-next:before {
    content: 'â†';
}

/*-----------------
	10. Focus Label
-----------------------*/

.form-focus {
    height: 50px;
    position: relative;
}
.form-focus .focus-label {
    font-size: 14px;
    font-weight: 400;
    pointer-events: none;
    position: absolute;
    -webkit-transform: translate3d(0, 22px, 0) scale(1);
    -ms-transform: translate3d(0, 22px, 0) scale(1);
    -o-transform: translate3d(0, 22px, 0) scale(1);
    transform: translate3d(0, 22px, 0) scale(1);
    transform-origin: left top;
    transition: 240ms;
    left: 12px;
    top: -8px;
    z-index: 1;
    color: #b8b8b8;
    margin-bottom: 0;
}
.form-focus.focused .focus-label {
    opacity: 1;
    top: -18px;
    font-size: 12px;
    z-index: 1;
}
.form-focus .form-control:focus ~ .focus-label,
.form-focus .form-control:-webkit-autofill ~ .focus-label {
    opacity: 1;
    font-weight: 400;
    top: -18px;
    font-size: 12px;
    z-index: 1;
}
.form-focus .form-control {
    height: 50px;
    padding: 21px 12px 6px;
}
.form-focus .form-control::-webkit-input-placeholder {
    color: transparent;
    transition: 240ms;
}
.form-focus .form-control:focus::-webkit-input-placeholder {
    transition: none;
}
.form-focus.focused .form-control::-webkit-input-placeholder {
    color: #bbb;
}
.form-focus.select-focus .focus-label {
    opacity: 1;
    font-weight: 300;
    top: -20px;
    font-size: 12px;
    z-index: 1;
}
.form-focus .select2-container .select2-selection--single {
    border: 1px solid #e3e3e3;
    height: 50px;
}
.form-focus .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 48px;
    right: 7px;
}
.form-focus .select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #ccc transparent transparent;
    border-style: solid;
    border-width: 6px 6px 0;
    height: 0;
    left: 50%;
    margin-left: -10px;
    margin-top: -2px;
    position: absolute;
    top: 50%;
    width: 0;
}
.form-focus .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent #ccc;
    border-width: 0 6px 6px;
}
.form-focus .select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 30px;
    padding-left: 12px;
    padding-top: 10px;
}
.form-focus .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #676767;
    font-size: 14px;
    font-weight: normal;
    line-height: 38px;
}
.form-focus .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #fc6075;
}

/*-----------------
	11. Header
-----------------------*/

.header-nav {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #fff;
    border: 0;
    border-bottom: 1px solid #f0f0f0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    position: relative;
    height: 85px;
    padding: 0 30px;
    margin-bottom: 0;
}
.main-nav {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}
.main-nav > li.active > a {
    color: #09dca4;
}
.main-nav > li .submenu li a {
    display: block;
    padding: 10px 15px;
    clear: both;
    white-space: nowrap;
    font-size: 14px;
    color: #2d3b48;
    -webkit-transition: all .35s ease;
    transition: all .35s ease;
    width: 100%;
    border-top: 1px solid #f0f0f0;
}
.main-nav > li .submenu > li.has-submenu > a::after {
    content: "\f054";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    right: 15px;
    top: 12px;
    font-size: 13px;
}
.main-nav > li .submenu li {
    position: relative;
}
.main-nav li a {
    display: block;
    font-size: 14px;
    font-weight: 500;
}
.main-nav li.login-link {
    display: none;
}
.logo {
    display: inline-block;
    margin-right: 30px;
    width: 160px;
}
.header-contact-img {
    display: inline-block;
}
.header-contact-img i {
    color: rgba(0, 0, 0, 0.5);
    font-size: 30px;
}
.header-contact-detail {
    display: inline-block;
    padding-left: 10px;
}
.header-contact-detail p.contact-header {
    color: #484848;
    font-size: 13px;
    font-weight: 400;
    margin-bottom: 2px;
    text-align: left;
}
.header-contact-detail p.contact-info-header {
    color: #000;
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 0;
}
.header-navbar-rht {
    margin: 0;
    margin-left: auto;
    padding: 0;
}
.header-navbar-rht li {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    padding-right: 20px;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.header-navbar-rht li:last-child {
    padding-right:0px;
}
.header-navbar-rht li .dropdown-menu {
    border: 0;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
}
.header-navbar-rht .dropdown-toggle::after {
    display: none;
}
.header-navbar-rht li .dropdown-menu::before {
    content: "";
    position: absolute;
    top: 2px;
    right: 0;
    border: 7px solid #fff;
    border-color: transparent transparent #ffffff #ffffff;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
    -webkit-transform: rotate(135deg);
    transform: rotate(135deg);
    box-shadow: -2px 2px 2px -1px rgba(0, 0, 0, 0.1);
}
.header-navbar-rht li .dropdown-menu .dropdown-item {
    border-top: 1px solid #f0f0f0;
    padding: 10px 15px;
}
.header-navbar-rht li .dropdown-menu .dropdown-item:first-child {
    border-top: 0;
    border-radius: 5px 5px 0 0;
}
.header-navbar-rht li .dropdown-menu .dropdown-item:last-child {
    border-radius: 0 0 5px 5px;
}
.header-navbar-rht li a.header-login:hover {
    background-color: #09e5ab;
    border-color: #09e5ab;
    color: #fff;
}
.header-navbar-rht li .dropdown-menu a:hover {
    color: #09dca4;
    letter-spacing: 0.5px;
    padding-left: 20px;
    background-color: #fff;
}
.header-navbar-rht li a.header-login {
    border: 2px solid #09e5ab;
    border-radius: 4px;
    padding: 10px 15px !important;
    text-align: center;
    font-size: 15px;
    color: #09e5ab;
    text-transform: uppercase;
    font-weight: 500;
}
.header .has-arrow .dropdown-toggle:after {
    border-top: 0;
    border-left: 0;
    border-bottom: 2px solid #757575;
    border-right: 2px solid #757575;
    content: '';
    height: 8px;
    display: inline-block;
    pointer-events: none;
    -webkit-transform-origin: 66% 66%;
    -ms-transform-origin: 66% 66%;
    transform-origin: 66% 66%;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: all 0.15s ease-in-out;
    transition: all 0.15s ease-in-out;
    width: 8px;
    vertical-align: 2px;
    margin-left: 10px;
}
.header .has-arrow .dropdown-toggle[aria-expanded="true"]:after {
    -webkit-transform: rotate(-135deg);
    -ms-transform: rotate(-135deg);
    transform: rotate(-135deg);
}
.user-menu {
    float: right;
    margin: 0;
    position: relative;
    z-index: 99;
}
.user-menu.nav > li > a {
    color: #fff;
    font-size: 14px;
    line-height: 58px;
    padding: 0 15px;
    height: 60px;
}
.user-menu.nav > li > a:hover,
.user-menu.nav > li > a:focus {
    background-color: rgba(0, 0, 0, 0.2);
}
.user-menu.nav > li > a:hover i,
.user-menu.nav > li > a:focus i {
    color: #fff;
}
.user-img {
    display: inline-block;
    position: relative;
}
.user-img > img {
    height: 31px;
    object-fit: cover;
    width: 31px;
}
.user-menu.nav > li > a.mobile_btn {
    border: 0;
    position: relative;
    padding: 0;
    margin: 0;
    cursor: pointer
}
.header-navbar-rht .dropdown-menu {
    min-width: 200px;
    padding: 0;
}
.header-navbar-rht .dropdown-menu .dropdown-item {
    padding: 7px 15px;
}
.header-navbar-rht .dropdown-menu .dropdown-item {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-top: 1px solid #e3e3e3;
    padding: 10px 15px;
}
.header-navbar-rht .dropdown-menu .dropdown-item:hover {
    color: #09dca4;
}
.user-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 10px 15px;
}
.user-header .user-text {
    margin-left: 10px;
}
.user-header .user-text h6 {
    font-size: 15px;
    margin-bottom: 2px;
}
.header-navbar-rht .logged-item .nav-link {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    font-size: 14px;
    line-height: 85px;
    padding: 0 10px;
}

/*-----------------
	12. Mobile Menu
-----------------------*/

.sidebar-overlay {
    background-color: rgba(0, 0, 0, 0.6);
    display: none;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1040;
}
.menu-opened .main-menu-wrapper {
    transform: translateX(0);
}
.menu-header {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #fff;
    height: 60px;
    padding:  0 20px;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    border-bottom: 1px solid #f0f0f0;
    display: none;
}
.menu-logo img {
    height: 40px;
}
.menu-close {
    font-size: 18px;
}
.bar-icon {
    display: inline-block;
    width: 31px;
}
.bar-icon span {
    background-color: #0de0fe;
    display: block;
    float: left;
    height: 3px;
    margin-bottom: 7px;
    width: 31px;
    border-radius: 2px;
}
.bar-icon span:nth-child(2) {
    width: 16px;
}
.bar-icon span:nth-child(3) {
    margin-bottom: 0;
}
#mobile_btn {
    display: none;
    margin-right: 30px;
}
html.menu-opened body {
    overflow: hidden;
}

/*-----------------
	13. Footer
-----------------------*/

.footer {
    background-color: #15558d;
}
.footer .footer-top {
    padding: 40px 0;
}
.footer-title {
    color: #fff;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 30px;
    text-transform: capitalize;
}
.footer .footer-widget.footer-menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    outline: none;
}
.footer .footer-widget .footer-logo {
    margin-bottom: 30px;
}
.footer .footer-widget .footer-about-content p {
    color: #fff;
}
.footer .footer-widget .footer-about-content p:last-child {
    margin-bottom: 0;
}
.footer .footer-menu ul li {
    margin-bottom: 10px;
    position: relative;
}
.footer .footer-menu ul li:last-child {
    margin-bottom: 0;
}
.footer .footer-menu ul li a {
    color: #fff;
    font-size: 15px;
    transition: all 0.4s ease 0s;
}
.footer .footer-menu ul li a i {
    margin-right: 5px;
}
.footer .footer-widget.footer-menu ul li a:hover {
    color: #fff;
    letter-spacing: 0.5px;
    padding-left: 10px;
}
.footer-contact-info {
    color: #fff;
    font-size: 15px;
}
.footer-contact-info .footer-address {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.footer-contact-info .footer-address span {
    margin-right: 20px;
}
.footer-contact-info .footer-address span i.fa-map-marker-alt {
    font-size: 20px;
}
.footer-contact-info p i {
    margin-right: 15px;
}
.footer .footer-bottom .copyright {
    border-top: 1px solid #1663a6;
    padding: 30px 0;
}
.footer .footer-bottom .copyright-text p {
    color: #fff;
    font-size: 15px;
}
.footer .footer-bottom .copyright-text p a {
    color: #09e5ab;
    -webkit-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.footer .footer-bottom .copyright-text p a:hover {
    color: #fff;
}
.footer .footer-bottom .copyright-text p.title {
    font-weight: 400;
    margin: 10px 0 0;
}
.footer .social-icon ul {
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    list-style: none;
    padding: 0;
    margin: 0;
}
.footer .social-icon ul li {
    margin-right: 15px;
}
.footer .social-icon ul li:last-child {
    margin-right: 0;
}
.footer .social-icon ul li a {
    color: #fff;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    font-size: 20px;
    transition: all 0.4s ease 0s;
}
.footer .social-icon ul li a:hover {
    color: #09e5ab;
}
.policy-menu {
    font-size: 14px;
    margin: 0;
    padding: 0;
    text-align: right;
}
.policy-menu li {
    display: inline-block;
    margin-right: 15px;
}
.policy-menu li:last-child {
    margin-right: 0;
}
.policy-menu li a {
    color: #fff;
}
.policy-menu li a:hover, .policy-menu li a:focus {
    color: #09e5ab;
}
.policy-menu li::after {
    color: #fff;
    content: "|";
    font-weight: 300;
    position: relative;
    left: 10px;
}
.policy-menu li:last-child::after {
    content: "";
}

/*-----------------
	14. Login
-----------------------*/

.account-page {
    background-color: #fff;
}
.account-page .content {
    padding: 50px 0;
}
.login-right {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    padding: 25px;
}
.login-header {
    margin-bottom: 20px;
}
.login-header p {
    margin-bottom: 0;
}
.login-header h3 {
    font-size: 18px;
    margin-bottom: 3px;
}
.login-header h3 a {
    color: #0de0fe;
    float: right;
    font-size: 15px;
    margin-top: 2px;
}
.login-right .dont-have {
    color: #3d3d3d;
    margin-top: 20px;
    font-size: 13px;
}
.login-right .dont-have a {
    color: #09dca4;
}
.login-btn {
    font-size: 18px;
    font-weight: 500;
}
.login-or {
    color: #d4d4d4;
    margin-bottom: 20px;
    margin-top: 20px;
    padding-bottom: 10px;
    padding-top: 10px;
    position: relative;
}
.or-line {
    background-color: #e5e5e5;
    height: 1px;
    margin-bottom: 0;
    margin-top: 0;
    display: block;
}
.span-or {
    background-color: #fff;
    display: block;
    left: 50%;
    margin-left: -20px;
    position: absolute;
    text-align: center;
    top: -3px;
    width: 42px;
}
.forgot-link {
    color: #3d3d3d;
    display: inline-block;
    font-size: 13px;
    margin-bottom: 10px;
    font-weight:400;
}
.btn-facebook {
    background-color: #3a559f;
    color: #fff;
    font-size: 13px;
    padding: 8px 12px;
}
.btn-google {
    background-color: #dd4b39;
    color: #fff;
    font-size: 13px;
    padding: 8px 12px;
}
.social-login .btn:hover, .social-login .btn:focus {
    color: #fff;
}

/*-----------------
	15. Home
-----------------------*/

.section-search {
    background: #f9f9f9 url(../img/search-bg.png) no-repeat bottom center;
    min-height: 450px;
    background-size: 100% auto;
    position: relative;
    background-blend-mode: Darken;
    padding: 80px 0;
}
.section-header {
    margin-bottom: 60px;
}
.section-header h2 {
    font-size: 36px;
    margin-bottom: 0;
    font-weight: 500;
}
.section-header .sub-title {
    color: #757575;
    font-size: 16px;
    max-width: 600px;
    margin: 15px auto 0;
}
.section-header p {
    color: #757575;
    font-size: 16px;
    margin-bottom: 0;
    margin-top: 15px;
}
.banner-wrapper {
    margin: 0 auto;
    max-width: 800px;
    width: 100%;
}
.banner-wrapper .banner-header {
    margin-bottom: 30px;
}
.banner-wrapper .banner-header h1 {
    margin-bottom: 10px;
    font-size: 40px;
    font-weight: 600;
}
.banner-wrapper .banner-header p {
    color: #757575;
    font-size: 20px;
    margin-bottom: 0;
}
.search-box form {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.search-box .form-control {
    border: 1px solid #ccc;
    box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
    border-radius: 5px;
    padding-left: 35px;
}
.search-box .search-location {
    -ms-flex: 0 0 240px;
    flex: 0 0 240px;
    margin-right: 12px;
    position: relative;
    width: 240px;
}
.search-location .form-control {
    background: #fff url(../img/location.png) no-repeat 10px center;
}
.search-box .search-info {
    -ms-flex: 0 0 490px;
    flex: 0 0 490px;
    margin-right: 12px;
    position: relative;
    width: 490px;
}
.search-info .form-control {
    background: #fff url(../img/search.png) no-repeat 10px center;
}
.search-box .search-btn {
    width: 46px;
    -ms-flex: 0 0 46px;
    flex: 0 0 46px;
    height: 46px;
}
.search-box .search-btn span {
    display: none;
    font-weight: 500;
}
.search-box .form-text {
    color: #757575;
    font-size: 13px;
}
.section-specialities {
    background-color: #fff;
    padding: 80px 0;
}
.slick-dots {
    position: absolute;
    bottom: -25px;
    display: block;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
    text-align: center;
}
.slick-dots li {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 5px;
    margin: 0 5px;
    padding: 0;
    cursor: pointer;
}
.slick-dots li button {
    font-size: 0;
    line-height: 0;
    display: block;
    width: 20px;
    height: 5px;
    padding: 0;
    cursor: pointer;
    color: transparent;
    border: 0;
    outline: none;
    background: #C0C0C0;
}
.slick-dots li button:hover,
.slick-dots li button:focus {
    outline: none;
}
.slick-dots li button:hover:before,
.slick-dots li button:focus:before {
    opacity: 1;
}
.slick-dots li button:before {
    display: none;
    font-family: 'slick';
    font-size: 76px;
    line-height: 20px;
    position: absolute;
    top: 0;
    left: 0;
    width: 20px;
    height: 20px;
    content: '-';
    text-align: center;
    opacity: .25;
    color: black;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button {
    background-color: #0de0fe;
}
.slick-dots li.slick-active button:before {
    opacity: 1;
    color: #0de0fe;
}
.slick-slide {
    outline: none !important;
}
.specialities-slider .slick-slide {
    display: block;
    padding: 0 12px;
    margin-left: 0;
    margin-right: 20px;
    margin-top: 10px;
}
.specialities-slider .slick-dots {
    margin-top: 44px;
    position: unset;
}
.speicality-img {
    position: relative;
    height: 150px;
    box-shadow: 2px 2px 13px rgba(0, 0, 0, 0.1);
    border-radius: 100%;
    width: 150px;
    background: #fff;
}
.speicality-img img {
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    right: 0;
    margin: 0 auto;
}
.speicality-img span {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    position: absolute;
    bottom: 10px;
    right: 10px;
    box-shadow: 1px 6px 14px rgba(0,0,0,0.2);
    border-radius: 50%;
    padding: 5px;
    background-color: #fff;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.speicality-img span i {
    font-size: 15px;
    color:#0de0fe;
}
.speicality-item p {
    font-size: 16px;
    font-weight: 500;
    margin: 30px 0 0;
}
.section-doctor {
    background-color: #f8f9fa;
    padding: 80px 0;
}
.section-doctor .section-header {
    margin-bottom: 30px;
}
.section-doctor .section-header p {
    margin-top: 10px;
}
.doctor-slider .slick-slide{
    display: block;
    margin-left: 0;
    padding: 10px;
    width: 280px;
}
.profile-widget {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    border-radius:4px;
    margin-bottom:30px;
    position:relative;
    -webkit-transition:all .3s ease 0s;
    -moz-transition:all .3s ease 0s;
    -o-transition:all .3s ease 0s;
    transition:all .3s ease 0s;
    padding: 15px;
}
.doc-img {
    position: relative;
    overflow: hidden;
    z-index: 1;
    border-radius: 4px;
}
.doc-img img {
    border-radius: 4px;
    transform: translateZ(0);
    transition: all 2000ms cubic-bezier(.19,1,.22,1) 0ms;
    width: 100%;
}
.doc-img:hover img {
    -webkit-transform: scale(1.15);
    -moz-transform: scale(1.15);
    transform: scale(1.15);
}
.profile-widget .fav-btn {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: #fff;
    width: 30px;
    height: 30px;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    border-radius: 3px;
    color: #2E3842;
    -webkit-transform: translate3d(100%, 0, 0);
    -ms-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    opacity: 0;
    visibility: hidden;
    z-index: 99;
}
.profile-widget:hover .fav-btn {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}
.profile-widget .fav-btn:hover {
    background-color: #fb1612;
    color: #fff;
}
.pro-content {
    padding: 15px 0 0;
}
.pro-content .title {
    font-size: 17px;
    font-weight: 500;
    margin-bottom: 5px;
}
.profile-widget .pro-content .title a {
    display: inline-block;
}
.profile-widget .verified {
    color: #28a745;
    margin-left: 3px;
}
.profile-widget p.speciality {
    font-size: 13px;
    color: #757575;
    margin-bottom: 5px;
    min-height: 40px;
}
.rating {
    list-style: none;
    margin: 0 0 7px;
    padding: 0;
    width: 100%;
}
.rating i {
    color: #dedfe0;
}
.rating i.filled {
    color: #f4c150;
}
.profile-widget .rating {
    color: #757575;
    font-size: 14px;
    margin-bottom: 15px;
}
.profile-widget .rating i {
    font-size: 14px;
}
.available-info {
    font-size: 13px;
    color: #757575;
    font-weight: 400;
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
}
.available-info li + li {
    margin-top: 5px;
}
.available-info li i {
    width: 22px;
}
.row.row-sm {
    margin-left: -3px;
    margin-right: -3px;
}
.row.row-sm > div {
    padding-left: 3px;
    padding-right: 3px;
}
.view-btn {
    color: #0de0fe;
    font-size: 13px;
    border: 2px solid #0de0fe;
    text-align: center;
    display: block;
    font-weight: 500;
    padding: 6px;
}
.view-btn:hover, .view-btn:focus {
    background-color: #0de0fe;
    color: #fff;
}
.book-btn {
    background-color: #0de0fe;
    border: 2px solid #0de0fe;
    color: #fff;
    font-size: 13px;
    text-align: center;
    display: block;
    font-weight: 500;
    padding: 6px;
}
.book-btn:hover, .book-btn:focus {
    background-color: #01cae4;
    border-color: #01cae4;
    color: #fff;
}
.section-doctor .profile-widget {
    box-shadow: 2px 2px 13px rgba(0, 0, 0, 0.1);
    margin-bottom: 0;
}
.about-content p {
    font-size: 14px;
    font-weight: 400;
    line-height: 26px;
    margin: 0;
}
.about-content p + p {
    margin-top: 20px;
}
.about-content a {
    background-color: #0de0fe;
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    font-size: 16px;
    font-weight: 500;
    margin-top: 30px;
    min-width: 150px;
    padding: 15px 20px;
    text-align: center;
}
.about-content a:hover, .about-content a:focus {
    background-color: #01cae4;
    border-color: #01cae4;
    color: #fff;
}
.section-features {
    background-color: #fff;
    padding: 80px 0;
}
.feature-item img {
    border-radius: 100%;
    box-shadow: 1px 6px 14px rgba(0,0,0,0.2);
    height: 115px;
    object-fit: cover;
    width: 115px;
}
.feature-item p {
    font-weight: 500;
    margin: 20px 0 0;
}
.features-slider .slick-slide {
    margin-right: 62px;
}
.features-slider .slick-center {
    opacity: 1;
    transform: scale(1.20);
}
.features-slider .slick-list {
    padding: 16px 50px !important
}
.features-slider .slick-dots {
    margin-top: 44px;
    position: unset;
}

/*-----------------
	16. Search
-----------------------*/

.breadcrumb-bar {
    background-color: #15558d;
    padding: 15px 0;
}
.breadcrumb-bar .breadcrumb-title {
    color: #fff;
    font-size: 22px;
    font-weight: 700;
    margin: 5px 0 0;
}
.page-breadcrumb ol {
    background-color: transparent;
    font-size: 12px;
    margin-bottom: 0;
    padding: 0;
}
.page-breadcrumb ol li a {
    color: #fff;
}
.page-breadcrumb ol li.active {
    color: #fff;
}
.page-breadcrumb .breadcrumb-item + .breadcrumb-item:before {
    color: #fff;
    font-size: 10px;
}
.sort-by {
    float: right;
}
.sort-title {
    color: #fff;
    font-size: 14px;
    margin-right: 10px;
}
.sortby-fliter {
    display: inline-block;
    width: 120px;
}
.cal-icon {
    position: relative;
    width: 100%;
}
.cal-icon:after {
    color: #979797;
    content: '\f073';
    display: block;
    font-family: "Font Awesome 5 Free";
    font-size: 16px;
    font-weight: 400;
    margin: auto;
    position: absolute;
    right: 15px;
    top: 10px;
}.custom_check {
     color: #666;
     display: inline-block;
     position: relative;
     font-size: 14px;
     font-size: .9375rem;
     padding-left: 30px;
     margin-bottom: 10px;
     cursor: pointer;
     -webkit-user-select: none;
     -moz-user-select: none;
     -ms-user-select: none;
     user-select: none
 }
.custom_check input {
    position: absolute;
    opacity: 0;
    cursor: pointer
}
.custom_check input:checked ~ .checkmark {
    background-color: #fff;
}
.custom_check .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    border: 1px solid #dcdcdc;
    background-color: #fff;
    border-radius: 3px;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
.custom_check .checkmark::after {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    display: none;
    left: 4px;
    top: 0;
    color: #0de0fe;
    font-size: 11px;
}
.custom_check input:checked ~ .checkmark:after {
    display: block
}
.custom_radio {
    color: #555;
    display: inline-block;
    position: relative;
    font-size: 14px;
    font-size: 0.9375rem;
    padding-left: 30px;
    margin-bottom: 10px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}
.radio_input .custom_radio + .custom_radio {
    margin-left: 15px;
}
.custom_radio input {
    position: absolute;
    opacity: 0
}
.custom_radio input:checked ~ .checkmark:after {
    opacity: 1
}
.custom_radio .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%
}
.custom_radio .checkmark:after {
    display: block;
    content: "";
    position: absolute;
    opacity: 0;
    top: 3px;
    left: 3px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #ff9b44;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}

.filter-widget {
    margin-bottom: 20px;
}
.filter-widget h4 {
    font-size: 1rem;
    margin-bottom: 15px;
}
.filter-widget .custom_check {
    line-height: 18px;
}
.btn-search .btn {
    background-color: #0de0fe;
    border: 1px solid #0de0fe;
    color: #fff;
    height: 46px;
    font-weight:500;
    font-size:16px;
}
.doctor-widget {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.doc-info-left {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.doc-info-right {
    margin-left: auto;
    -ms-flex: 0 0 200px;
    flex: 0 0 200px;
    max-width: 200px;
}
.doctor-img {
    -ms-flex: 0 0 150px;
    flex: 0 0 150px;
    margin-right: 20px;
    width: 150px;
}
.doctor-img img {
    border-radius: 5px;
}
.doc-department {
    color: #20c0f3;
    font-size: 14px;
    margin-bottom: 8px;
}
.doc-department img {
    width: 19px;
    display: inline-block;
    margin-right: 10px;
}
.doc-location {
    color: #757575;
    font-size: 14px;
    margin-bottom: 25px;
}
.doc-location a {
    color: #09e5ab;
    font-weight: 500;
}
.doctor-widget .doc-name {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 3px;
}
.doc-speciality {
    font-size: 14px;
    color: #757575;
    margin-bottom: 15px;
}
.doctor-widget .rating i {
    font-size: 14px;
}
.doctor-widget .average-rating {
    font-size: 14px;
    font-weight: 500;
}
.clinic-details {
    margin-bottom: 15px;
}
.clinic-details h5 {
    font-weight: normal;
    color: #757575;
    margin-bottom: 25px;
}
.clinic-details ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.clinic-details ul li {
    display: inline-block;
    padding-right: 5px;
}
.clinic-details ul li:last-child {
    padding-right: 0;
}
.clinic-details ul li a {
    display: inline-block;
}
.clinic-details ul li a img {
    border-radius: 5px;
    width: 40px;
}
.clinic-services {
    color: #272b41;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    font-size: 13px;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.clinic-services span {
    border: 1px solid #ccc;
    border-radius: 4px;
    display: inline-block;
    font-size: 12px;
    padding: 3px 10px;
}
.clinic-services span + span {
    margin-left: 5px;
}
.clini-infos {
    margin-bottom: 15px;
}
.clini-infos ul {
    font-size: 14px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.clini-infos ul li {
    display: block;
    line-height: 30px;
    color: #4E4852;
}
.clini-infos ul li i {
    font-size: 15px;
    min-width: 30px;
}
.clinic-booking a + a {
    margin-top: 15px;
}
.clinic-booking a {
    background-color: #fff;
    border: 2px solid #20c0f3;
    border-radius: 4px;
    color: #20c0f3;
    display: block;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    padding: 10px 20px;
    text-align: center;
    text-transform: uppercase;
    width: 100%;
}
.clinic-booking a.view-pro-btn:hover, .clinic-booking a.view-pro-btn:focus {
    background: #20c0f3;
    color: #fff;
}
.clinic-booking a.apt-btn {
    background-color: #20c0f3;
    color: #fff;
}
.clinic-booking a.apt-btn:hover, .clinic-booking a.apt-btn:focus {
    background-color: #0db9f2;
    border-color: #0db9f2;
    color: #fff;
}
.load-more {
    margin-bottom: 30px;
}

/*-----------------
	17. Doctor Profile
-----------------------*/

.clinic-direction {
    color: #757575;
    font-size: 14px;
    margin-bottom: 25px;
}
.clinic-direction a {
    color: #09e5ab;
    font-weight: 500;
}
.doctor-action {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 15px;
}
.doctor-action a + a {
    margin-left: 8px;
}
.doctor-action .fav-btn:hover {
    background-color: #fb1612;
    border-color: #fb1612;
    color: #fff;
}
.msg-btn:hover, .msg-btn:focus {
    background-color: #09e5ab;
    border-color: #09e5ab;
    color: #fff;
}
.call-btn:hover, .call-btn:focus {
    background-color: #09e5ab;
    border-color: #09e5ab;
    color: #fff;
}
.user-tabs .nav-tabs > li > a {
    border: 0;
    border-bottom: 3px solid transparent;
    color: #3e3e3e;
    font-weight: 600;
    padding: 20px;
}
.user-tabs .nav-tabs.nav-tabs-bottom > li > a.active,
.user-tabs .nav-tabs.nav-tabs-bottom > li > a.active:hover,
.user-tabs .nav-tabs.nav-tabs-bottom > li > a.active:focus {
    border-bottom-width: 3px;
    color: #20c0f3;
}
.user-tabs .med-records {
    display: inline-block;
    min-width: 130px;
}
.user-tabs .nav-tabs > li > a:hover {
    background-color: unset;
    color: #20c0f3;
}
.widget {
    margin-bottom: 30px;
}
.widget-title {
    margin-bottom: 15px;
}
.experience-box {
    position: relative;
}
.experience-list {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
}
.experience-list::before {
    background: #ddd;
    bottom: 0;
    content: "";
    left: 8px;
    position: absolute;
    top: 8px;
    width: 2px;
}
.experience-list > li {
    position: relative;
}
.experience-list > li:last-child .experience-content {
    margin-bottom: 0;
}
.experience-user .avatar {
    height: 32px;
    line-height: 32px;
    margin: 0;
    width: 32px;
}
.experience-list > li .experience-user {
    background: #fff;
    height: 10px;
    left: 4px;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 4px;
    width: 10px;
}
.experience-list > li .experience-content {
    background-color: #fff;
    margin: 0 0 20px 40px;
    padding: 0;
    position: relative;
}
.experience-list > li .experience-content .timeline-content {
    color: #757575;
}
.experience-list > li .experience-content .timeline-content a.name {
    font-weight: 500;
}
.experience-list > li .time {
    color: #757575;
    display: block;
    font-size: 13px;
}
.before-circle {
    background-color: rgba(32, 192, 243, 0.2);
    border-radius: 50%;
    height: 12px;
    width: 12px;
    border: 2px solid #20c0f3;
}
.exp-year {
    color: #20c0f3;
    margin-bottom: 2px;
}
.exp-title {
    font-size: 16px;
}
.awards-widget .experience-list > li:last-child p {
    margin-bottom: 0;
}
.service-list {
    margin-bottom: 30px;
}
.service-list:last-child {
    border-bottom: 0;
    margin-bottom: 0;
    padding-bottom: 0;
}
.service-list ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.service-list ul li {
    float: left;
    margin: 6px 0;
    padding-left: 25px;
    position: relative;
    width: 33%;
}
.service-list ul li::before {
    color: #ccc;
    content: '\f30b';
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    left: 0;
    position: absolute;
}
.location-list {
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    padding: 20px;
}
.location-list + .location-list {
    margin-top: 20px;
}
.clinic-content .clinic-name {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 3px;
}
.clinic-content .clinic-direction a {
    display: inline-block;
    margin-top: 8px;
}
.timings-days {
    font-weight: bold;
    color: #272b41;
    margin-bottom: 5px;
}
.timings-times span {
    display: block;
}
.location-list .consult-price {
    font-size: 20px;
    font-weight: 500;
    color: #272b41;
}
.review-listing {
    border-bottom: 1px solid #f5f7fc;
    margin-top: 20px;
    padding-bottom: 30px;
}
.review-listing > ul {
    padding: 0;
    margin: 0;
    list-style: none;
}
.review-listing > ul li + li {
    margin-top: 20px;
    border-top: 1px dashed #f0f0f0;
    padding-top: 20px;
}
.review-listing > ul li .comment {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 30px;
}
.review-listing > ul li .comment:last-child {
    margin-bottom: 0;
}
.review-listing > ul li .comment .comment-body {
    margin-left: 16px;
}
.review-listing > ul li .comment .comment-body .meta-data {
    position: relative;
    margin-bottom: 10px;
}
.review-listing > ul li .comment .comment-body .meta-data span {
    display: block;
    font-size: 16px;
    color: #757575;
}
.review-listing > ul li .comment .comment-body .meta-data span.comment-author {
    font-weight: 600;
    color: #272b41;
    text-transform: capitalize;
}
.review-listing > ul li .comment .comment-body .meta-data span.comment-date {
    font-size: 14px;
}
.review-listing > ul li .comment .comment-body .meta-data .review-count {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    top: 3px;
    right: 0;
    width: auto;
}
.review-listing > ul li .comment .comment-body .comment-content {
    color: #757575;
    margin-top: 15px;
    margin-bottom: 15px;
    font-size: 14px;
}
.review-listing > ul li .comment .comment-body .comment-reply .comment-btn {
    color: #20c0f3;
    display: inline-block;
    font-weight: 500;
    font-size: 15px;
}
.review-listing .recommend-btn {
    float: right;
    color: #757575;
    font-size: 14px;
    padding: 5px 0;
    margin-bottom: 0;
}
.review-listing .recommend-btn a {
    border: 1px solid rgba(128,137,150,0.4);
    border-radius: 4px;
    padding: 4px 12px;
    color: #757575;
    margin-left: 3px;
    margin-right: 3px;
    transition: all .3s;
}
.review-listing .recommend-btn a.like-btn:hover {
    background-color: #28a745;
    border: 1px solid #28a745;
    color: #fff;
}
.review-listing .recommend-btn a.dislike-btn:hover {
    background-color: #dc3545;
    border: 1px solid #dc3545;
    color: #fff;
}
.review-listing .recommend-btn a i {
    font-size: 16px;
}
.review-listing > ul li .comments-reply {
    list-style: none;
    margin-left: 65px;
    padding: 0;
}
.recommended {
    color: #28a745;
    font-size: 15px;
    font-weight: 500;
    margin: 0;
}
.all-feedback {
    margin-top: 20px;
}
.star-rating {
    direction: rtl;
}
.star-rating input[type=radio] {
    display: none
}
.star-rating label {
    color: #bbb;
    cursor: pointer;
    font-size: 18px;
    padding: 0;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}
.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input[type=radio]:checked ~ label {
    color: #f2b600
}
.terms-accept a {
    color: #20c0f3;
    font-weight: 500;
}
.business-widget {
    background-color: #fcfcfc;
    border: 1px solid #f0f0f0;
    padding: 20px;
    margin-bottom: 0;
}
.listing-day {
    -webkit-box-align: flex-start;
    -ms-flex-align: flex-start;
    align-items: flex-start;
    color: #000;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    margin-bottom: 10px;
}
.listing-day:last-child {
    margin-bottom: 0;
}
.listing-day.current {
    border-bottom: 1px solid #ddd;
    padding-bottom: 13px;
    margin-bottom: 13px;
}
.listing-day .day {
    font-weight: 500;
}
.listing-day.current .day {
    font-weight: bold;
}
.listing-day.current .day span {
    display: block;
    font-weight: normal;
}
.time-items {
    color: #757575;
}
.time-items > span {
    display: block;
    text-align: right;
}
.time-items > span.open-status {
    margin-bottom: 3px;
}
.dropzone .dz-preview.dz-error:hover .dz-error-message {
    display: none;
}
/*-----------------
	18. Booking
-----------------------*/

.booking-doc-info {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.booking-doc-info .booking-doc-img {
    width: 80px;
    margin-right: 15px;
}
.booking-doc-info .booking-doc-img img {
    border-radius: 4px;
    height: 80px;
    width: 80px;
    object-fit: cover;
}
.schedule-widget {
    border-radius: 4px;
    min-height: 100px;
}
.schedule-header h4 {
    font-size: 18px;
    font-weight: 600;
    margin: 3px 0 0;
}
.schedule-header {
    border-bottom: 1px solid #f0f0f0;
    border-radius: 4px 4px 0 0;
    padding: 10px 20px;
}
.day-slot ul {
    float: left;
    list-style: none;
    margin-bottom: 0;
    margin-left: -5px;
    margin-right: -5px;
    padding: 0;
    position: relative;
    width: 100%;
}
.day-slot li {
    float: left;
    padding-left: 5px;
    padding-right: 5px;
    text-align: center;
    width: 14.28%;
}
.day-slot li span {
    display: block;
    font-size: 18px;
    text-transform: uppercase;
}
.day-slot li span.slot-date {
    display: block;
    color: #757575;
    font-size: 14px;
}
.day-slot li small.slot-year {
    color: #757575;
    font-size: 14px;
}
.day-slot li.left-arrow {
    left: 0;
    padding: 0;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 20px !important;
    transform: translateY(-50%);
}
.day-slot li.right-arrow {
    right: -11px;
    padding: 0;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 20px !important;
    transform: translateY(-50%);
}
.schedule-cont {
    padding: 20px;
}
.time-slot ul {
    list-style: none;
    margin-right: -5px;
    margin-left: -5px;
    margin-bottom: 0;
    padding: 0;
}
.time-slot li {
    float: left;
    padding-left: 5px;
    padding-right: 5px;
    width: 14.28%;
}
.time-slot li .timing {
    background-color: #e9e9e9;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
    color: #757575;
    display: block;
    font-size: 14px;
    margin-bottom: 10px;
    padding: 5px 5px;
    text-align: center;
    position: relative;
}
.time-slot li .timing:hover {
    background-color: #fff;
}
.time-slot li .timing:last-child {
    margin-bottom: 0;
}
.time-slot li .timing.selected {
    background-color: #42c0fb;
    border: 1px solid #42c0fb;
    color: #fff;
}
.time-slot li .timing.selected::before {
    color: #fff;
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-size: 12px;
    font-weight: 900;
    position: absolute;
    right: 6px;
    top: 6px;
}
.schedule-list {
    border-bottom: 1px solid #cfcfcf;
    margin-bottom: 50px;
    padding-bottom: 50px;
}
.schedule-list:last-child {
    border-bottom: 0;
    margin-bottom: 0;
    padding-bottom: 0;
}
.submit-section.proceed-btn {
    margin: 0 0 30px;
}

/*-----------------
	19. Checkout
-----------------------*/

.info-widget {
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 30px;
    margin-bottom: 30px;
}
.card-label > label {
    background-color: #fff;
    color: #959595;
    display: inline-block;
    font-size: 13px;
    font-weight: 500;
    margin: 6px auto auto 8px;
    padding: 0 7px;
}
.card-label > input {
    background-color: #fff;
    border: 1px solid #dbdbdb;
    border-radius: 4px;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .05);
    display: block;
    height: 50px;
    margin-top: -13px;
    padding: 5px 15px 0;
    transition: border-color .3s;
    width: 100%;
}
.exist-customer a {
    color: #20c0f3;
    font-weight: 500;
}
.payment-widget .payment-list + .payment-list {
    margin-bottom: 15px;
}
.payment-radio {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-weight: 600;
    color: #272b41;
    text-transform: capitalize;
}
.payment-radio input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}
.payment-radio .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    width: 19px;
    height: 19px;
    margin: 3px 0 0 0;
    border: 2px solid #ddd;
    border-top-color: rgb(221, 221, 221);
    border-right-color: rgb(221, 221, 221);
    border-bottom-color: rgb(221, 221, 221);
    border-left-color: rgb(221, 221, 221);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -ms-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
}
.payment-radio input:checked ~ .checkmark {
    border-color: #20c0f3;
}
.payment-radio .checkmark::after {
    position: absolute;
    left: 3px;
    top: 3px;
    content: '';
    width: 9px;
    height: 9px;
    background-color: #20c0f3;
    opacity: 0;
    visibility: hidden;
    -webkit-transform: scale(0.1);
    -moz-transform: scale(0.1);
    -ms-transform: scale(0.1);
    -o-transform: scale(0.1);
    transform: scale(0.1);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -ms-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
}
.payment-radio input:checked ~ .checkmark::after {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    visibility: visible;
}
.booking-date {
    padding: 0;
    list-style: none;
}
.booking-date li {
    position: relative;
    font-size: 14px;
    font-weight: 500;
    color: #272b41;
    text-transform: capitalize;
    margin-bottom: 15px;
}
.booking-date li span {
    float: right;
    color: #757575;
    font-weight: 400;
    font-size: 15px;
}
.booking-fee {
    padding: 0;
    list-style: none;
}
.booking-fee li {
    position: relative;
    font-size: 14px;
    font-weight: 500;
    color: #272b41;
    text-transform: capitalize;
    margin-bottom: 15px;
}
.booking-fee li span {
    float: right;
    color: #757575;
    font-weight: 400;
    font-size: 15px;
}
.booking-total {
    border-top: 1px solid #e4e4e4;
    margin-top: 20px;
    padding-top: 20px;
}
.booking-total ul {
    padding: 0;
    list-style: none;
    margin: 0;
}
.booking-total ul li span {
    font-size: 18px;
    font-weight: 600;
    color: #272b41;
}
.booking-total ul li .total-cost {
    color: #20c0f3;
    font-size: 16px;
    float: right;
}

/*-----------------
	20. Booking Success
-----------------------*/

.success-page-cont {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display:flex;
}
.success-card .card-body {
    padding: 50px 20px;
}
.success-cont {
    text-align: center;
}
.success-cont i {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    color: #fff;
    width: 60px;
    height: 60px;
    border: 2px solid #09e5ab;
    border-radius: 50%;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    font-size: 30px;
    margin-bottom: 30px;
    background-color: #09e5ab;
}
.success-cont h3 {
    font-size: 24px;
}
.success-cont p {
    margin-bottom: 30px;
}
.success-cont strong {
    font-weight: 600;
}
.view-inv-btn {
    font-size: 16px;
    font-weight: 600;
    padding: 12px 30px;
}

/*-----------------
	21. Invoice View
-----------------------*/

.invoice-content {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    margin-bottom: 30px;
    padding: 30px;
}
.invoice-item .invoice-logo {
    margin-bottom: 30px;
}
.invoice-item .invoice-logo img {
    width: auto;
    max-height: 52px;
}
.invoice-item .invoice-text h2 {
    color:#272b41;
    font-size:36px;
    font-weight:600;
}
.invoice-item .invoice-details {
    text-align:right;
    color:#757575;
    font-weight:500
}
.invoice-item .invoice-details strong {
    color:#272b41
}
.invoice-item .invoice-details-two {
    text-align:left
}
.invoice-item .invoice-text {
    padding-top:42px;
    padding-bottom:36px
}
.invoice-item .invoice-text h2 {
    font-weight:400
}
.invoice-info {
    margin-bottom: 30px;
}
.invoice-info p {
    margin-bottom: 0;
}
.invoice-info.invoice-info2 {
    text-align: right;
}
.invoice-item .customer-text {
    font-size: 18px;
    color: #272b41;
    font-weight: 600;
    margin-bottom: 8px;
    display: block
}
.invoice-table tr th,
.invoice-table tr td,
.invoice-table-two tr th,
.invoice-table-two tr td {
    color: #272b41;
    font-weight: 600;
    padding: 10px 20px;
    line-height: inherit
}
.invoice-table tr td,
.invoice-table-two tr td {
    color: #757575;
    font-weight: 500;
}
.invoice-table-two {
    margin-bottom:0
}
.invoice-table-two tr th,
.invoice-table-two tr td {
    border-top: 0;
}
.invoice-table-two tr td {
    text-align: right
}
.invoice-info h5 {
    font-size: 16px;
    font-weight: 500;
}
.other-info {
    margin-top: 10px;
}

/*-----------------
	22. Schedule Timings
-----------------------*/

.tab-content.schedule-cont .card-title {
    margin-bottom: 10px;
}
.doc-times {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.doc-slot-list {
    background-color: #d9534f;
    border: 1px solid #d43f3a;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
    margin: 10px 10px 0 0;
    padding: 6px 15px;
}
.doc-slot-list a {
    color: #e48784;
    display: inline-block;
    margin-left: 5px;
}
.doc-slot-list a:hover {
    color: #fff;
}
.schedule-nav .nav-tabs {
    border: 0 !important;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.schedule-nav .nav-tabs li {
    margin: 5px 15px 5px 0;
    display: inline-block;
}
.schedule-nav .nav-tabs li:last-child {
    margin-right: 0;
}
.schedule-nav .nav-tabs > li > a {
    border: 1px solid #dcddea;
    border-radius: 4px;
    padding: 6px 15px;
    text-transform: uppercase;
}
.schedule-nav .nav-tabs li a.active {
    background: #ff4877;
    border: 1px solid #ff4877 !important;
    color: #fff;
}
.hours-info .form-control {
    min-height: auto;
}
.hours-info .btn.btn-danger.trash {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 38px;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.edit-link {
    color: #20c0f3;
    font-size: 16px;
    margin-top: 4px;
}

/*-----------------
	23. Doctor Dashboard
-----------------------*/

.dash-widget {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.circle-bar {
    margin-right: 15px;
}
.dct-border-rht {
    border-right: 1px solid #f0f0f0;
}
.dash-widget h6 {
    font-size: 16px;
    font-weight: 400;
}
.dash-widget h3 {
    font-size: 24px;
    margin-bottom: 5px;
}
.dash-widget p {
    color: #757575;
    font-size: 14px;
    margin-bottom: 0;
}
.circle-bar > div {
    display: inline-block;
    position: relative;
    text-align: center;
}
.circle-bar > div img {
    left: 0;
    position: absolute;
    top: 50%;
    right: 0;
    text-align: center;
    margin: 0 auto;
    transform: translateY(-50%);
}
.circle-bar > div canvas {
    width: 90px !important;
    height: 90px !important;
}
.dash-card .row {
    margin-left: -10px;
    margin-right: -10px;
}
.dash-card .row > div {
    padding-left: 10px;
    padding-right: 10px;
}
.appointment-tab {
    margin-bottom: 30px;
}
.appointment-tab .nav-tabs {
    background-color: #fff;
    padding: 1.5rem;
    border: 1px solid #f0f0f0;
    border-radius: .25rem 0.25rem 0 0 !important;
    border-bottom: 0;
}
.appointment-tab .tab-content {
    padding-top: 0;
}
.appointment-tab .card {
    border-radius: 0;
}
.submit-btn-bottom {
    margin-bottom: 30px;
}

/*-----------------
	24. Patient Profile
-----------------------*/

.add-new-btn {
    background-color: #0de0fe;
    border-radius: 30px;
    color: #fff;
    display: inline-block;
    font-weight: 500;
    margin-bottom: 20px;
    padding: 10px 20px;
}
.add-new-btn:focus, .add-new-btn:hover,.add-new-btn:active {
    background-color: #0de0fe;
    color: #fff;
}
.patient-info {
    margin-top: 15px;
}
.patient-info ul {
    padding: 0;
    list-style: none;
    font-size: .875rem;
    margin: 0;
}
.patient-info ul li {
    position: relative;
    font-size: .875rem;
    font-weight: 500;
    color: #272b41;
    text-transform: capitalize;
}
.patient-info ul li + li {
    margin-top: 15px;
}
.patient-info ul li i {
    width: 18px;
}
.patient-info ul li span {
    color: #757575;
    float: right;
    font-weight: 400;
}

/*-----------------
	25. Add Billing
-----------------------*/

.biller-info, .billing-info {
    margin-bottom: 15px;
}
.add-more-item {
    margin-bottom: 10px;
}
.add-more-item a {
    color: #0de0fe;
    font-weight: 500;
}
.signature-wrap {
    float: right;
    margin-bottom: 20px;
    text-align: center;
    width: 220px;
}
.signature {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border: 2px dashed #ccc;
    border-radius: 4px;
    color: #272b41;
    cursor: pointer;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    height: 85px;
    margin-bottom: 15px;
    width: 100%;
}
.signature:hover {
    background-color: #fcfcfc;
}
.sign-name {
    width:100%;
    float:right;
}
.pat-widget-profile .pro-widget-content {
    padding: 0 0 20px;
}
.pat-widget-profile .booking-date li {
    font-size: .875rem;
}
.pat-widget-profile .booking-date li span {
    font-size: .875rem;
}

/*-----------------
	26. Chat
-----------------------*/

.chat-page .content {
    padding: 0;
}
.chat-page .content > .container-fluid {
    padding: 0;
}
.chat-page .footer {
    display: none;
}
.chat-window {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    position: relative;
}
.chat-cont-left {
    border-right: 1px solid #f0f0f0;
    -ms-flex: 0 0 35%;
    flex: 0 0 35%;
    left: 0;
    max-width: 35%;
    position: relative;
    z-index: 4;
}
.chat-cont-left .chat-header {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
    color: #272b41;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: 72px;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    padding: 0 15px;
}
.chat-cont-left .chat-header span {
    font-size: 20px;
    font-weight: 500;
    text-transform: capitalize;
}
.chat-cont-left .chat-header .chat-compose {
    color: #8a8a8a;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
}
.chat-cont-left .chat-search {
    background-color: #f5f5f6;
    border-bottom: 1px solid #e5e5e5;
    padding: 10px 15px;
    width: 100%;
}
.chat-cont-left .chat-search .input-group {
    width: 100%;
}
.chat-cont-left .chat-search .input-group .form-control {
    background-color: #fff;
    border-radius: 50px;
    padding-left: 36px;
}
.chat-cont-left .chat-search .input-group .form-control:focus {
    border-color: #ccc;
    box-shadow: none;
}
.chat-cont-left .chat-search .input-group .input-group-prepend {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    bottom: 0;
    color: #666;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    left: 15px;
    pointer-events: none;
    position: absolute;
    top: 0;
    z-index: 4;
}
.chat-window .chat-scroll {
    min-height: 300px;
    max-height: calc(100vh - 224px);
    overflow-y: auto;
}
.chat-cont-left .chat-users-list {
    background-color: #fff;
}
.chat-cont-left .chat-users-list a.media {
    border-bottom: 1px solid #f0f0f0;
    padding: 10px 15px;
    transition: all 0.2s ease 0s;
}
.chat-cont-left .chat-users-list a.media:last-child {
    border-bottom: 0;
}
.chat-cont-left .chat-users-list a.media .media-img-wrap {
    margin-right: 15px;
    position: relative;
}
.chat-cont-left .chat-users-list a.media .media-img-wrap .avatar {
    height: 45px;
    width: 45px;
}
.chat-cont-left .chat-users-list a.media .media-img-wrap .status {
    bottom: 7px;
    height: 10px;
    right: 4px;
    position: absolute;
    width: 10px;
    border: 2px solid #fff;
}
.chat-cont-left .chat-users-list a.media .media-body {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
}
.chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name,
.chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name {
    color: #272b41;
    text-transform: capitalize;
}
.chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
    color: #8a8a8a;
    font-size: 14px;
    line-height: 24px;
}
.chat-cont-left .chat-users-list a.media .media-body > div:last-child {
    text-align: right;
}
.chat-cont-left .chat-users-list a.media .media-body > div:last-child .last-chat-time {
    color: #8a8a8a;
    font-size: 13px;
}
.chat-cont-left .chat-users-list a.media:hover {
    background-color: #f5f5f6;
}
.chat-cont-left .chat-users-list a.media.read-chat .media-body > div:last-child .last-chat-time {
    color: #8a8a8a;
}
.chat-cont-left .chat-users-list a.media.active {
    background-color: #f5f5f6;
}
.chat-cont-right {
    -ms-flex: 0 0 65%;
    flex: 0 0 65%;
    max-width: 65%;
}
.chat-cont-right .chat-header {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: 72px;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    padding: 0 15px;
}
.chat-cont-right .chat-header .back-user-list {
    display: none;
    margin-right: 5px;
    margin-left: -7px;
}
.chat-cont-right .chat-header .media {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
.chat-cont-right .chat-header .media .media-img-wrap {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-right: 15px;
}
.chat-cont-right .chat-header .media .media-img-wrap .avatar {
    height: 50px;
    width: 50px;
}
.chat-cont-right .chat-header .media .media-img-wrap .status {
    border: 2px solid #fff;
    bottom: 0;
    height: 10px;
    position: absolute;
    right: 3px;
    width: 10px;
}
.chat-cont-right .chat-header .media .media-body .user-name {
    color: #272b41;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
}
.chat-cont-right .chat-header .media .media-body .user-status {
    color: #666;
    font-size: 14px;
}
.chat-cont-right .chat-header .chat-options {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.chat-cont-right .chat-header .chat-options > a {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border-radius: 50%;
    color: #8a8a8a;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    height: 30px;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    margin-left: 10px;
    width: 30px;
}
.chat-cont-right .chat-body {
    background-color: #f5f5f6;
}
.chat-cont-right .chat-body ul.list-unstyled {
    margin: 0 auto;
    padding: 15px;
    width: 100%;
}
.chat-cont-right .chat-body .media .avatar {
    height: 30px;
    width: 30px;
}
.chat-cont-right .chat-body .media .media-body {
    margin-left: 20px;
}
.chat-cont-right .chat-body .media .media-body .msg-box > div {
    padding: 10px 15px;
    border-radius: .25rem;
    display: inline-block;
    position: relative;
}
.chat-cont-right .chat-body .media .media-body .msg-box > div p {
    color: #272b41;
    margin-bottom: 0;
}
.chat-cont-right .chat-body .media .media-body .msg-box + .msg-box {
    margin-top: 5px;
}
.chat-cont-right .chat-body .media.received {
    margin-bottom: 20px;
}
.chat-cont-right .chat-body .media:last-child {
    margin-bottom: 0;
}
.chat-cont-right .chat-body .media.received .media-body .msg-box > div {
    background-color: #fff;
}
.chat-cont-right .chat-body .media.sent {
    margin-bottom: 20px;
}
.chat-cont-right .chat-body .media.sent .media-body {
    -webkit-box-align: flex-end;
    -ms-flex-align: flex-end;
    align-items: flex-end;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    justify-content: flex-end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: flex-end;
    margin-left: 0;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div {
    background-color: #e3e3e3;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div p {
    color: #272b41;
}
.chat-cont-right .chat-body .chat-date {
    font-size: 14px;
    margin: 1.875rem 0;
    overflow: hidden;
    position: relative;
    text-align: center;
    text-transform: capitalize;
}
.chat-cont-right .chat-body .chat-date:before {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    margin-right: 28px;
    position: absolute;
    right: 50%;
    top: 50%;
    width: 100%;
}
.chat-cont-right .chat-body .chat-date:after {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    left: 50%;
    margin-left: 28px;
    position: absolute;
    top: 50%;
    width: 100%;
}
.chat-cont-right .chat-footer {
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    padding: 10px 15px;
    position: relative;
}
.chat-cont-right .chat-footer .input-group {
    width: 100%;
}
.chat-cont-right .chat-footer .input-group .form-control {
    background-color: #f5f5f6;
    border: none;
    border-radius: 50px;
}
.chat-cont-right .chat-footer .input-group .form-control:focus {
    background-color: #f5f5f6;
    border: none;
    box-shadow: none;
}
.chat-cont-right .chat-footer .input-group .input-group-prepend .btn,
.chat-cont-right .chat-footer .input-group .input-group-append .btn {
    background-color: transparent;
    border: none;
    color: #9f9f9f;
}
.chat-cont-right .chat-footer .input-group .input-group-append .btn.msg-send-btn {
    background-color: #0de0fe;
    border-color: #0de0fe;
    border-radius: 50%;
    color: #fff;
    margin-left: 10px;
    min-width: 46px;
    font-size: 20px;
}
.msg-typing {
    width: auto;
    height: 24px;
    padding-top: 8px
}
.msg-typing span {
    height: 8px;
    width: 8px;
    float: left;
    margin: 0 1px;
    background-color: #a0a0a0;
    display: block;
    border-radius: 50%;
    opacity: .4
}
.msg-typing span:nth-of-type(1) {
    animation: 1s blink infinite .33333s
}
.msg-typing span:nth-of-type(2) {
    animation: 1s blink infinite .66666s
}
.msg-typing span:nth-of-type(3) {
    animation: 1s blink infinite .99999s
}
.chat-cont-right .chat-body .media.received .media-body .msg-box {
    position: relative;
}
.chat-cont-right .chat-body .media.received .media-body .msg-box:first-child:before {
    border-bottom: 6px solid transparent;
    border-right: 6px solid #fff;
    border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: -6px;
    position: absolute;
    right: auto;
    top: 8px;
    width: 0;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box {
    padding-left: 50px;
    position: relative;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box:first-child:before {
    border-bottom: 6px solid transparent;
    border-left: 6px solid #e3e3e3;
    border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: auto;
    position: absolute;
    right: -6px;
    top: 8px;
    width: 0;
}
.chat-msg-info {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    clear: both;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
    margin: 5px 0 0;
}
.chat-msg-info li {
    font-size: 13px;
    padding-right: 16px;
    position: relative;
}
.chat-msg-info li:not(:last-child):after {
    position: absolute;
    right: 8px;
    top: 50%;
    content: '';
    height: 4px;
    width: 4px;
    background: #d2dde9;
    border-radius: 50%;
    transform: translate(50%, -50%)
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box .chat-msg-info li:not(:last-child)::after {
    right: auto;
    left: 8px;
    transform: translate(-50%, -50%);
    background: #aaa;
}
.chat-cont-right .chat-body .media.received .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-msg-info li a {
    color: #777;
}
.chat-msg-info li a:hover {
    color: #2c80ff
}
.chat-seen i {
    color: #00d285;
    font-size: 16px;
}
.chat-msg-attachments {
    padding: 4px 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    margin: 0 -1px
}
.chat-msg-attachments > div {
    margin: 0 1px
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div .chat-msg-info {
    flex-direction: row-reverse;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div .chat-msg-attachments {
    flex-direction: row-reverse
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div .chat-msg-info li {
    padding-left: 16px;
    padding-right: 0;
    position: relative;
}
.chat-attachment img {
    max-width: 100%;
}
.chat-attachment {
    position: relative;
    max-width: 130px;
    overflow: hidden;
}
.chat-attachment {
    border-radius: .25rem;
}
.chat-attachment:before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: #000;
    content: "";
    opacity: 0.4;
    transition: all .4s;
}
.chat-attachment:hover:before {
    opacity: 0.6;
}
.chat-attach-caption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    color: #fff;
    padding: 7px 15px;
    font-size: 13px;
    opacity: 1;
    transition: all .4s;
}
.chat-attach-download {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: all .4s;
    color: #fff;
    width: 32px;
    line-height: 32px;
    background: rgba(255, 255, 255, 0.2);
    text-align: center;
}
.chat-attach-download:hover {
    color: #495463;
    background: #fff;
}
.chat-attachment:hover .chat-attach-caption {
    opacity: 0;
}
.chat-attachment:hover .chat-attach-download {
    opacity: 1;
}
.chat-attachment-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: -5px;
}
.chat-attachment-list li {
    width: 33.33%;
    padding: 5px;
}
.chat-attachment-item {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    border: 5px solid rgba(230, 239, 251, 0.5);
    height: 100%;
    min-height: 60px;
    text-align: center;
    font-size: 30px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.chat-cont-right .chat-body .media.sent .media-body .msg-box > div:hover .chat-msg-actions {
    opacity: 1;
}
.chat-msg-actions {
    position: absolute;
    left: -30px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: all .4s;
    z-index: 2;
}
.chat-msg-actions > a {
    padding: 0 10px;
    color: #495463;
    font-size: 24px;
}
.chat-msg-actions > a:hover {
    color: #2c80ff;
}

@keyframes blink {
    50% {
        opacity: 1
    }
}
.btn-file {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    font-size: 20px;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    overflow: hidden;
    padding: 0 0.75rem;
    position: relative;
    vertical-align: middle;
}
.btn-file input {
    cursor: pointer;
    filter: alpha(opacity=0);
    font-size: 23px;
    height: 100%;
    margin: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
}

/*-----------------
	27. Doctor Profile Settings
-----------------------*/

.profile-image img {
    margin-bottom: 1.5rem;
}
.change-photo-btn {
    background-color: #20c0f3;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    display: block;
    font-size: 13px;
    font-weight: 600;
    margin: 0 auto;
    padding: 10px 15px;
    position: relative;
    transition: .3s;
    text-align: center;
    width: 220px;
}
.change-photo-btn input.upload {
    bottom: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
    left: 0;
    margin: 0;
    opacity: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: 220px;
}
.dropzone {
    background-color: #fbfbfb;
    border: 2px dashed rgba(0, 0, 0, 0.1);
}
.btn-icon-dp {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    text-align: center;
    position: absolute;
    padding: 0;
    font-size: 10px;
    width: 20px;
    height: 20px;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    right: 3px;
    top: 3px;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.upload-images {
    position: relative;
    width: 80px;
}
.upload-images img {
    border-radius: 4px;
    height: 80px;
    width: auto;
}
.upload-wrap {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.upload-wrap .upload-images + .upload-images {
    margin-left: 20px;
}
.contact-card .card-body {
    padding-bottom: 0.625rem;
}
.custom_price_cont {
    margin-top: 20px;
}
.btn.btn-danger.trash {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 46px;
    width: 46px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.add-more a {
    color: #20c0f3;
}
.bootstrap-tagsinput {
    border-color: #dcdcdc;
    box-shadow: inherit;
    min-height: 46px;
    width: 100%;
    border-radius: 0;
}
.bootstrap-tagsinput.focus {
    border-color: #bbb;
}
.bootstrap-tagsinput .tag {
    background-color: #20c0f3;
    color: #fff;
    display: inline-block;
    font-size: 14px;
    font-weight: normal;
    margin-right: 2px;
    padding: 11px 15px;
    border-radius: 0;
}
.services-card .bootstrap-tagsinput input {
    width: 160px;
}
.submit-section .submit-btn {
    padding: 12px 30px;
    font-weight: 600;
    font-size: 16px;
    min-width: 120px;
}
.submit-section .submit-btn + .submit-btn {
    margin-left: 15px;
}

/*-----------------
	28. Calendar
-----------------------*/

#calendar-events {
    background-color: #fcfcfc;
}
.calendar-events {
    border: 1px solid transparent;
    cursor: move;
    padding: 10px 15px;
}
.calendar-events:hover {
    border-color: #e9e9e9;
    background-color: #fff;
}
.calendar-events i {
    margin-right: 8px;
}
.calendar {
    float: left;
    margin-bottom: 0;
}
.fc-toolbar.fc-header-toolbar {
    margin-bottom: 1.5rem;
}
.none-border .modal-footer {
    border-top: none;
}
.fc-toolbar h2 {
    font-size: 18px;
    font-weight: 600;
    font-family: 'Roboto', sans-serif;
    line-height: 30px;
    text-transform: uppercase;
}
.fc-day-grid-event .fc-time {
    font-family: 'Roboto', sans-serif;
}
.fc-day {
    background: #fff;
}
.fc-toolbar .fc-state-active,
.fc-toolbar .ui-state-active,
.fc-toolbar button:focus,
.fc-toolbar button:hover,
.fc-toolbar .ui-state-hover {
    z-index: 0;
}
.fc th.fc-widget-header {
    background: #eeeeee;
    font-size: 14px;
    line-height: 20px;
    padding: 10px 0;
    text-transform: uppercase;
}
.fc-unthemed th,
.fc-unthemed td,
.fc-unthemed thead,
.fc-unthemed tbody,
.fc-unthemed .fc-divider,
.fc-unthemed .fc-row,
.fc-unthemed .fc-popover {
    border-color: #f3f3f3;
}
.fc-basic-view .fc-day-number,
.fc-basic-view .fc-week-number {
    padding: 2px 5px;
}
.fc-button {
    background: #f1f1f1;
    border: none;
    color: #797979;
    text-transform: capitalize;
    box-shadow: none !important;
    border-radius: 3px !important;
    margin: 0 3px !important;
    padding: 6px 12px !important;
    height: auto !important;
}
.fc-text-arrow {
    font-family: inherit;
    font-size: 16px;
}
.fc-state-hover {
    background: #f3f3f3;
}
.fc-state-highlight {
    background: #f0f0f0;
}
.fc-state-down,
.fc-state-active,
.fc-state-disabled {
    background-color: #20c0f3 !important;
    color: #fff !important;
    text-shadow: none !important;
}
.fc-cell-overlay {
    background: #f0f0f0;
}
.fc-unthemed .fc-today {
    background: #fff;
}
.fc-event {
    border-radius: 2px;
    border: none;
    color: #fff !important;
    cursor: move;
    font-size: 13px;
    margin: 1px 7px;
    padding: 5px 5px;
    text-align: center;
}
.fc-basic-view td.fc-week-number span {
    padding-right: 8px;
    font-weight: 700;
    font-family: 'Roboto', sans-serif;
}
.fc-basic-view td.fc-day-number {
    padding-right: 8px;
    font-weight: 700;
    font-family: 'Roboto', sans-serif;
}
.event-form .input-group .form-control {
    height: 40px;
}

/*-----------------
	29. Patient Dashboard
-----------------------*/

.profile-sidebar {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    margin-bottom:30px;
    overflow: hidden;
}
.pro-widget-content {
    border-bottom: 1px solid #f0f0f0;
    padding: 20px;
    text-align: center;
}

.profile-info-widget {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    text-align: left;
}
.profile-info-widget .booking-doc-img {
    margin-right: 15px;
}
.profile-info-widget .booking-doc-img img {
    border-radius: 4px;
    height: 90px;
    width: 90px;
    object-fit: cover;
}
.profile-det-info {
    overflow: hidden;
}
.profile-det-info h3 {
    font-size: 17px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.patient-details h5 {
    color: #757575;
    font-size: 13px;
    font-weight: normal;
    margin-bottom: 8px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.patient-details h5 i {
    width: 18px;
}
.dashboard-menu ul {
    color: #757575;
    font-size: 14px;
    line-height: 17px;
    list-style: none;
    margin: 0;
    padding: 0;
    text-transform: capitalize;
}
.dashboard-menu ul li {
    line-height: inherit;
}
.dashboard-menu > ul > li {
    border-bottom:1px solid #f0f0f0;
    position: relative;
}
.dashboard-menu > ul > li:last-child {
    border-bottom: 0;
}
.dashboard-menu ul li a span,
.dashboard-menu ul li a i {
    display: inline-block;
    vertical-align: middle;
}
.dashboard-menu > ul > li > a {
    color: #757575;
    display: block;
    padding: 16px 20px;
}
.dashboard-menu > ul > li:hover > a,
.dashboard-menu > ul > li.active > a {
    color:#0de0fe;
}
.dashboard-menu ul li a i {
    font-size: 16px;
    margin-right: 10px;
    width: 16px;
}
.unread-msg {
    background-color: #09e5ab;
    border-radius: 2px;
    color: #272b41;
    font-size: 10px;
    font-style: normal;
    padding: 0 5px;
    position: absolute;
    right: 20px;
    text-align: center;
    top: 50%;
    transform: translateY(-50%);
}

/*-----------------
	30. Profile Settings
-----------------------*/

.change-avatar {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.change-avatar .profile-img {
    margin-right: 15px;
}
.change-avatar .profile-img img {
    border-radius: 4px;
    height: 100px;
    width: 100px;
    object-fit: cover;
}
.change-avatar .change-photo-btn {
    margin: 0 0 10px;
    width: 150px;
}
.widget-profile.pat-widget-profile .profile-info-widget .booking-doc-img {
    padding: 0;
}
.widget-profile.pat-widget-profile .profile-info-widget .booking-doc-img img {
    border-radius: 50%;
    height: 100px;
    width: 100px;
}

/*-----------------
	31. Appoitment List
-----------------------*/

.widget-profile {
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
}
.widget-profile .profile-info-widget {
    display: block;
    text-align: center;
}
.widget-profile .profile-info-widget .booking-doc-img {
    display: inline-block;
    margin: 0 0 15px;
    width: auto;
    padding: 8px;
    background-color: #f7f7f7;
    border-radius: 50%;
}
.widget-profile .profile-info-widget .booking-doc-img img {
    border-radius: 50%;
    height: 120px;
    width: 120px;
}
.appointment-list .profile-info-widget {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-right: auto;
    text-align: left;
}
.appointment-list .profile-info-widget .booking-doc-img img {
    border-radius: 4px;
    height: 120px;
    object-fit: cover;
    width: 120px;
}
.appointments .appointment-list {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 20px;
}
.appointments .appointment-list:last-child {
    margin-bottom: 30px;
}
.appointments .appointment-action {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
}
.appointment-action a + a {
    margin-left: 5px;
}
.appointment-action a {
    font-size: 13px;
}
.info-details {
    list-style: none;
    margin: 0;
    padding: 0;
}
.info-details li .title {
    color: #272b41;
    font-weight: 500;
}
.info-details li .text {
    color: #757575;
    display: block;
    font-size: 16px;
    overflow: hidden;
}
.info-details li {
    margin-bottom: 10px;
}
.info-details li:last-child {
    margin-bottom: 0;
}

/*-----------------
	32. Reviews
-----------------------*/

.doc-review.review-listing {
    margin: 0;
}
.review-listing.doc-review > ul > li {
    background-color: #fff;
    border: 1px solid #f0f0f0;
    padding: 20px;
}

/*-----------------
	33. Voice call
-----------------------*/

.modal-open .main-wrapper {
    -webkit-filter: blur(1px);
    -moz-filter: blur(1px);
    -o-filter: blur(1px);
    -ms-filter: blur(1px);
    filter: blur(1px);
}
.call-main-row {
    bottom: 0;
    left: 0;
    overflow: auto;
    padding-bottom: inherit;
    padding-top: inherit;
    position: absolute;
    right: 0;
    top: 0;
}
.call-main-wrapper {
    display: table;
    height: 100%;
    table-layout: fixed;
    width: 100%;
}
.call-view {
    display: table-cell;
    height: 100%;
    float: none;
    padding: 0;
    position: static;
    vertical-align: top;
    width: 75%;
}
.call-window {
    display: table;
    height: 100%;
    table-layout: fixed;
    width: 100%;
    background-color: #fff;
    border: 1px solid #f0f0f0;
}
.fixed-header {
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
    padding: 10px 15px;
}
.fixed-header .navbar {
    border: 0 none;
    margin: 0;
    min-height: auto;
    padding: 0;
}
.fixed-header .user-info a {
    color: #272b41;
    font-weight: 500;
}
.typing-text {
    color: #20c0f3;
    font-size: 12px;
    text-transform: lowercase;
}
.last-seen {
    color: #888;
    display: block;
    font-size: 12px;
}
.custom-menu {
    margin-top: 6px;
}
.fixed-header .custom-menu {
    margin: 0 0 1px;
}
.custom-menu.nav > li > a {
    color: #bbb;
    font-size: 26px;
    line-height: 32px;
    margin-left: 15px;
    padding: 0;
}
.custom-menu.navbar-nav > li > a:hover,
.custom-menu.navbar-nav > li > a:focus {
    background-color: transparent;
}
.custom-menu .dropdown-menu {
    left: auto;
    right: 0;
}
.call-contents {
    display: table-row;
    height: 100%;
}
.call-content-wrap {
    height: 100%;
    position: relative;
    width: 100%;
}
.voice-call-avatar {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-direction: column;
    flex-direction: column;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    -ms-flex: 2;
    flex: 2;
}
.voice-call-avatar .call-avatar {
    margin: 15px;
    width: 150px;
    height: 150px;
    border-radius: 100%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3px;
    background-color: #fff;
}
.call-duration {
    display: inline-block;
    font-size: 30px;
    margin-top: 4px;
    position: absolute;
    left: 0;
}
.voice-call-avatar .call-timing-count {
    padding: 5px;
}
.voice-call-avatar .username {
    font-size: 20px;
    font-weight: 500;
}
.call-footer {
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    padding: 15px;
}
.call-icons {
    text-align: center;
    position: relative;
}
.call-icons .call-items {
    border-radius: 5px;
    padding: 0;
    margin: 0;
    list-style: none;
    display: inline-block;
}
.call-icons .call-items .call-item {
    display: inline-block;
    text-align: center;
    margin-right: 5px;
}
.call-icons .call-items .call-item:last-child {
    margin-right: 0;
}
.call-icons .call-items .call-item a {
    color: #777;
    border: 1px solid #ddd;
    width: 50px;
    height: 50px;
    line-height: 50px;
    border-radius: 50px;
    display: inline-block;
    font-size: 20px;
}
.call-icons .call-items .call-item a i {
    width: 18px;
    height: 18px;
}
.user-video {
    bottom: 0;
    left: 0;
    overflow: auto;
    position: absolute;
    right: 0;
    top: 0;
    z-index: 10;
}
.user-video img {
    width: auto;
    max-width: 100%;
    height: auto;
    max-height: 100%;
    display: block;
    margin: 0 auto;
}
.user-video video {
    width: auto;
    max-width: 100%;
    height: auto;
    max-height: 100%;
    display: block;
    margin: 0 auto;
}
.my-video {
    position: absolute;
    z-index: 99;
    bottom: 20px;
    right: 20px;
}
.my-video ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.my-video ul li {
    float: left;
    width: 120px;
    margin-right: 10px;
}
.my-video ul li img {
    border: 3px solid #fff;
    border-radius: 6px;
}
.end-call {
    position: absolute;
    top: 7px;
    right: 0;
}
.end-call a {
    background-color: #f06060;
    border-radius: 50px;
    color: #fff;
    display: inline-block;
    line-height: 10px;
    padding: 8px 25px;
    text-transform: uppercase;
}
.call-users {
    position: absolute;
    z-index: 99;
    bottom: 20px;
    right: 20px;
}
.call-users ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.call-users ul li {
    float: left;
    width: 80px;
    margin-left: 10px;
}
.call-users ul li img {
    border-radius: 6px;
    padding: 2px;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
}
.call-mute {
    width: 80px;
    height: 80px;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    text-align: center;
    line-height: 80px;
    border-radius: 6px;
    font-size: 30px;
    color: #fff;
    display: none;
    top: 0;
    border: 3px solid transparent;
}
.call-users ul li a:hover .call-mute {
    display: block;
}
.call-details {
    margin: 10px 0 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.call-info {
    margin-left: 10px;
    width: 100%;
}
.call-user-details,
.call-timing {
    display: block;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
.call-description {
    white-space: nowrap;
    vertical-align: bottom;
}
.call-timing {
    color: #727272;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    font-size: 14px;
    margin-top: 1px;
    overflow: hidden;
    white-space: pre;
}

/*-----------------
	34. Video Call
-----------------------*/

.content-full {
    height: 100%;
    position: relative;
    width: 100%;
}
.video-window .fixed-header {
    padding: 0;
    border: 0;
}
.video-window .fixed-header .nav > li > a {
    padding: 18px 15px;
}

/*-----------------
	35. Outgoing Call
-----------------------*/

.call-box .call-wrapper {
    height: auto;
    text-align: center;
}
.call-box .call-wrapper .call-avatar {
    margin-bottom: 30px;
    cursor: pointer;
    animation: ripple 2s infinite;
}
.call-box .call-wrapper .call-user {
    margin-bottom: 30px;
}
.call-box .call-wrapper .call-user span {
    display: block;
    font-weight: 500;
    text-align: center;
}
.call-box .call-wrapper .call-items {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
}
.call-box .call-wrapper .call-items .call-item {
    background-color: rgba(255, 255, 255, 0.2);
    border: 1px solid transparent;
    border-radius: 100%;
    color: #fff;
    line-height: 0;
    margin: 0 5px;
    padding: 15px;
}
.call-box .call-wrapper .call-items .call-item:hover {
    opacity: 0.9;
}
.call-box .call-wrapper .call-items .call-item:first-child {
    margin-top: -30px;
}
.call-box .call-wrapper .call-items .call-item:last-child {
    margin-top: -30px;
}
.call-box .call-wrapper .call-items .call-item.call-end {
    padding: 20px;
    margin: 30px 20px 0;
    background: #f06060;
    border: 1px solid #f06060;
    color: #fff;
    line-height: 0;
    border-radius: 100%;
}
.call-box .call-wrapper .call-items .call-item.call-start {
    padding: 20px;
    margin: 30px 20px 0;
    background: #55ce63;
    border: 1px solid #55ce63;
    color: #fff;
    line-height: 0;
    border-radius: 100%;
}
.call-box.incoming-box .call-wrapper .call-items .call-item.call-start {
    margin: 0 10px;
}
.call-box.incoming-box .call-wrapper .call-items .call-item.call-end {
    margin: 0 10px;
}
.call-box .call-avatar {
    border-radius: 100%;
    height: 140px;
    max-width: 140px;
    min-width: 140px;
    position: relative;
    width: 100%;
    border: 10px solid #fafafa;
}
.call-box .btn {
    background: rgba(0, 0, 0, 0);
    transition: all 0.3s ease 0s;
}
@-webkit-keyframes ripple {
    0% {
        -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
    }
    100% {
        -webkit-box-shadow: 0 0 0 30px rgba(0, 0, 0, 0);
    }
}
@keyframes ripple {
    0% {
        -moz-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
    }
    100% {
        -moz-box-shadow: 0 0 0 30px rgba(0, 0, 0, 0);
        box-shadow: 0 0 0 30px rgba(0, 0, 0, 0);
    }
}

/*-----------------
	36. Incoming Call
-----------------------*/

.incoming-btns {
    margin-top: 20px;
}
.call-wrapper {
    position: relative;
    height: calc(100vh - 145px);
}
.call-page .footer {
    display: none;
}
.dropdown-action .dropdown-toggle::after {
    display: none;
}
.call-modal .modal-body {
    padding: 40px;
}
.call-modal .modal-content {
    border: 0;
    border-radius: 10px;
}
.call-box .call-wrapper .call-user h4 {
    font-size: 24px;
}

/*-----------------
	37. Terms and Conditions
-----------------------*/

.terms-text {
    margin-bottom: 20px;
}
.terms-text h4 {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
}
.terms-text p {
    color: #666;
    display: inline-block;
    font-size: 16px;
}

/*-----------------
	38. Responsive
-----------------------*/

@media only screen and (min-width:768px) {
    .avatar-xxl {
        width: 8rem;
        height: 8rem;
    }
    .avatar-xxl .border {
        border-width: 4px !important;
    }
    .avatar-xxl .rounded {
        border-radius: 12px !important;
    }
    .avatar-xxl .avatar-title {
        font-size: 42px;
    }
    .avatar-xxl.avatar-away:before,
    .avatar-xxl.avatar-offline:before,
    .avatar-xxl.avatar-online:before {
        border-width: 4px;
    }
}
@media (min-width: 992px) {
    .main-nav > li {
        margin-right: 30px;
    }
    .main-nav > li:last-child {
        margin-right: 0;
    }
    .main-nav li {
        display: block;
        position: relative;
    }
    .main-nav > li > a {
        line-height: 85px;
        padding: 0 !important;
    }
    .main-nav > li > a > i {
        font-size: 12px;
        margin-left: 3px;
    }
    .main-nav li > ul {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 3px  rgba(0, 0, 0, 0.1);
        display: block;
        font-size: 14px;
        left: 0;
        margin: 0;
        min-width: 200px;
        opacity: 0;
        padding: 0;
        position: absolute;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
        top: 100%;
        visibility: hidden;
        z-index: 1000;
    }
    .main-nav li .submenu::before {
        border: 7px solid #fff;
        border-color: transparent transparent #fff #fff;
        box-shadow: -2px 2px 2px -1px rgba(0, 0, 0, 0.1);
        content: "";
        left: 45px;
        position: absolute;
        top: 2px;
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
        -webkit-transform: rotate(135deg);
        transform: rotate(135deg);
    }
    .main-nav li.has-submenu:hover > .submenu {
        visibility: visible;
        opacity: 1;
        margin-top: 0;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    .main-nav .has-submenu.active > a {
        color: #09dca4;
    }
    .main-nav .has-submenu.active .submenu li.active > a {
        color: #09dca4;
    }
    .main-nav > li .submenu li:first-child a {
        border-top: 0;
    }
    .main-nav > li.has-submenu:hover > .submenu > li.has-submenu:hover > .submenu {
        visibility: visible;
        opacity: 1;
        margin-top: -1px;
        margin-right: 0;
    }
    .main-nav > li .submenu > li .submenu {
        left: 100%;
        top: 0;
        margin-top: 10px;
    }
    .main-nav li .submenu a:hover {
        color: #09dca4;
        letter-spacing: 0.5px;
        padding-left: 20px;
    }
    .main-nav > .has-submenu > .submenu > .has-submenu > .submenu::before {
        top: 20px;
        margin-left: -35px;
        box-shadow: 1px 1px 0 0 rgba(0,0,0,.15);
        border-color: transparent #fff #fff transparent;
    }
    .header-navbar-rht li.show > .dropdown-menu {
        visibility: visible;
        opacity: 1;
        margin-top: 0;
        -webkit-transform: translateY(0);
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    .header-navbar-rht li .dropdown-menu {
        border-radius: 5px;
        padding: 0;
        margin: 0;
        min-width: 200px;
        visibility: hidden;
        opacity: 0;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
        display: block;
        -webkit-transform: translateY(20px);
        -ms-transform: translateY(20px);
        transform: translateY(20px);
    }
}

@media only screen and (max-width: 1399px) {
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name,
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
        max-width: 180px;
    }
    .row.row-grid {
        margin-left: -8px;
        margin-right: -8px;
    }
    .row.row-grid > div {
        padding-right: 8px;
        padding-left: 8px;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
}
@media only screen and (max-width: 1199px) {
    .header-nav {
        padding-left: 20px;
        padding-right: 20px;
    }
    .container-fluid {
        padding-left: 20px;
        padding-right: 20px;
    }
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name,
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
        max-width: 150px;
    }
    .chat-cont-left {
        -ms-flex: 0 0 40%;
        flex: 0 0 40%;
        max-width: 40%;
    }
    .chat-cont-right {
        -ms-flex: 0 0 60%;
        flex: 0 0 60%;
        max-width: 60%;
    }
    .row.row-grid > div {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }
    .dash-widget {
        -ms-flex-direction: column;
        flex-direction: column;
        text-align: center;
    }
    .circle-bar {
        margin: 0 0 15px;
    }
}
@media only screen and (max-width: 991.98px) {
    .main-nav {
        padding: 0;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
    .main-nav ul {
        background-color: #3474ac;
        display: none;
        list-style: none;
        margin: 0;
        padding-left: 0;
    }
    .main-nav > li {
        border-bottom: 1px solid #1663a6;
        margin-left: 0;
    }
    .main-nav li + li {
        margin-left: 0;
    }
    .main-nav > li > a {
        line-height: 1.5;
        padding: 15px 20px !important;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }
    .main-nav > li > a > i {
        float: right;
        margin-top: 5px;
    }
    .main-nav > li .submenu li a {
        border-top: 0;
        color: #fff;
        padding: 10px 15px 10px 35px;
    }
    .main-nav > li .submenu ul li a {
        padding: 10px 15px 10px 45px;
    }
    .main-nav > li .submenu > li.has-submenu > a::after {
        content: "\f078";
    }
    .main-nav .has-submenu.active > a {
        color: #09dca4;
    }
    .main-nav .has-submenu.active .submenu li.active > a {
        color: #09dca4;
    }
    .login-left {
        display: none;
    }
    .main-menu-wrapper {
        order: 3;
        width: 260px;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 1060;
        transform: translateX(-260px);
        transition: all 0.4s;
        background-color: #15558d;
    }
    .menu-header {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .header-navbar-rht li.contact-item {
        display: none;
    }
    .navbar-header {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
    }
    #mobile_btn {
        display: inline-block;
    }
    .section-search {
        min-height: 330px;
    }
    .section-specialities {
        padding: 50px 0;
    }
    .footer-widget {
        margin-bottom: 30px;
    }
    .chat-cont-left, .chat-cont-right {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        transition: left 0.3s ease-in-out 0s, right 0.3s ease-in-out 0s;
        width: 100%;
    }
    .chat-cont-left {
        border-right: 0;
    }
    .chat-cont-right {
        position: absolute;
        right: -100%;
        top: 0;
        opacity: 0;
        visibility: hidden;
    }
    .chat-cont-right .chat-header {
        justify-content: start;
        -webkit-justify-content: start;
        -ms-flex-pack: start;
    }
    .chat-cont-right .chat-header .back-user-list {
        display: block;
    }
    .chat-cont-right .chat-header .chat-options {
        margin-left: auto;
    }
    .chat-window.chat-slide .chat-cont-left {
        left: -100%;
    }
    .chat-window.chat-slide .chat-cont-right {
        right: 0;
        opacity: 1;
        visibility: visible;
    }
    .day-slot li.left-arrow {
        left: -10px;
    }
    .container {
        max-width: 100%;
    }
    .appointments .appointment-action {
        margin-top: 10px;
    }
    .appointments .appointment-list {
        display: block;
    }
    .banner-wrapper {
        max-width: 720px;
    }
    .search-box .search-info {
        -ms-flex: 0 0 410px;
        flex: 0 0 410px;
        width: 410px;
    }
    .banner-wrapper .banner-header h1 {
        font-size: 2.125rem;
    }
    .dct-border-rht {
        border-bottom: 1px solid #f0f0f0;
        border-right: 0;
        margin-bottom: 20px;
        padding-bottom: 15px;
    }
    .card-label > label {
        font-size: 12px;
    }
    .footer .footer-top {
        padding-bottom: 10px;
    }
    .time-slot li .timing.selected::before {
        display: none;
    }
    .review-listing .recommend-btn {
        float: none;
    }
    .dash-widget {
        flex-direction: unset;
        text-align: left;
    }
    .circle-bar {
        margin: 0 15px 0 0;
    }
    .call-wrapper {
        height: calc(100vh - 140px);
    }
    .sidebar-overlay.opened {
        display: block;
    }
    .about-content {
        margin-bottom: 30px;
    }
}
@media only screen and (max-width: 849.98px) {
    .row.row-grid > div {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
}
@media only screen and (max-width: 767.98px) {
    body {
        font-size: 0.875rem;
    }
    h1, .h1 {
        font-size: 2rem;
    }
    h2, .h2 {
        font-size: 1.75rem;
    }
    h3, .h3 {
        font-size: 1.375rem;
    }
    h4, .h4 {
        font-size: 1rem;
    }
    h5, .h5 {
        font-size: 0.875rem;
    }
    h6, .h6 {
        font-size: 0.75rem;
    }
    .content {
        padding: 15px 0 0;
    }
    .account-page .content {
        padding: 15px 0;
    }
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }
    .card {
        margin-bottom: 20px;
    }
    .profile-sidebar {
        margin-bottom: 20px;
    }
    .appointment-tab {
        margin-bottom: 20px;
    }
    .features-slider .slick-dots, .features-img img {
        text-align: center;
        margin: 0 auto;
    }
    .doctor-slider {
        margin-top: 25px;
    }
    .breadcrumb-bar {
        height: auto;
    }
    .login-right {
        margin: 0 15px;
        padding: 15px;
    }
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name,
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
        max-width: 250px;
    }
    .chat-window .chat-cont-right .chat-header .media .media-body {
        display: none;
    }
    .banner-wrapper .banner-header h1 {
        font-size: 2rem;
    }
    .banner-wrapper .banner-header p {
        font-size: 1rem;
    }
    .section-header h2 {
        font-size: 1.875rem;
    }
    .section-header .sub-title {
        font-size: 0.875rem;
    }
    .speicality-item p {
        font-size: 0.875rem;
    }
    .section-header p {
        font-size: 0.9375rem;
    }
    .footer-title {
        font-size: 1.125rem;
    }
    .search-box {
        max-width: 535px;
        margin: 0 auto;
    }
    .search-box form {
        -ms-flex-direction: column;
        flex-direction: column;
        word-wrap: break-word;
        background-clip: border-box;
    }
    .search-box .search-location {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        width: 100%;
    }
    .search-box .search-info {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        width: 100%;
    }
    .search-box .search-btn {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        min-height: 46px;
        width: 100%;
    }
    .search-box .search-btn span {
        display: inline-block;
        margin-left: 5px;
        text-transform: uppercase;
    }
    .section-search {
        background: #f9f9f9;
    }
    .day-slot li span {
        font-size: 16px;
        text-transform: unset;
    }
    .time-slot li .timing span {
        display: block;
    }
    .submit-section.proceed-btn {
        margin-bottom: 20px;
    }
    .day-slot li small.slot-year {
        display: none;
    }
    .success-cont h3 {
        font-size: 22px;
    }
    .view-inv-btn {
        font-size: 14px;
        padding: 10px 30px;
    }
    .invoice-info.invoice-info2 {
        text-align: left;
    }
    .invoice-item .invoice-details {
        text-align: left;
    }
    .section-search, .section-doctor, .section-features {
        padding: 50px 0;
    }
    .slick-next {
        right: -10px;
    }
    .slick-prev {
        left: -10px;
    }
    .specialities-slider .slick-slide {
        margin-right: 15px;
    }
    .about-content a {
        padding: 12px 20px;
    }
    .submit-section .submit-btn {
        padding: 10px 20px;
        font-size: 15px;
        min-width: 105px;
    }
    .policy-menu {
        margin-top: 10px;
        text-align: left;
    }
    .booking-doc-info .booking-doc-img {
        width: 75px;
    }
    .booking-doc-info .booking-doc-img img {
        height: 75px;
        width: 75px;
    }
    .btn.btn-danger.trash {
        margin-bottom: 20px;
    }
    .nav-tabs.nav-tabs-bottom > li > a.active, .nav-tabs.nav-tabs-bottom > li > a.active:hover, .nav-tabs.nav-tabs-bottom > li > a.active:focus {
        background-color: #f5f5f5;
    }
    .nav-tabs.nav-justified {
        border-bottom: 1px solid #ddd;
    }
    .nav-tabs.nav-justified > li > a.active,
    .nav-tabs.nav-justified > li > a.active:hover,
    .nav-tabs.nav-justified > li > a.active:focus {
        border-color: transparent transparent transparent #20c0f3;
        border-left-width: 2px;
    }
    .nav-tabs {
        border-bottom: 0;
        position: relative;
        background-color: #fff;
        padding: 5px 0;
        border: 1px solid #ddd;
        border-radius: 3px;
    }
    .nav-tabs .nav-item {
        margin-bottom: 0;
    }
    .nav-tabs > li > a {
        border-width: 2px;
        border-left-color: transparent;
    }
    .nav-tabs .nav-link {
        border-width: 2px;
    }
    .nav-tabs > li > a:hover,
    .nav-tabs > li > a:focus {
        background-color: #fafafa;
    }
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active,
    .nav-tabs > li > a.active,
    .nav-tabs > li > a.active:hover,
    .nav-tabs > li > a.active:focus {
        border-color: transparent transparent transparent #20c0f3 !important;
        border-left-width: 2px;
    }
    .nav-tabs > li.open:not(.active) > a,
    .nav-tabs > li.open:not(.active) > a:hover,
    .nav-tabs > li.open:not(.active) > a:focus {
        background-color: #fafafa;
    }
    .nav-tabs.nav-tabs-solid {
        padding: 5px;
    }
    .nav-tabs.nav-tabs-solid.nav-tabs-rounded {
        border-radius: 5px;
    }
    .nav-tabs.nav-tabs-solid > li > a {
        border-left-width: 0!important;
    }
    .nav-tabs-justified {
        border-bottom: 1px solid #ddd;
    }
    .nav-tabs-justified > li > a.active,
    .nav-tabs-justified > li > a.active:hover,
    .nav-tabs-justified > li > a.active:focus {
        border-width: 0 0 0 2px;
        border-left-color: #20c0f3;
    }
    .review-listing > ul li .comment .comment-body .meta-data span.comment-date {
        margin-bottom: 5px;
    }
    .review-listing > ul li .comment .comment-body .meta-data .review-count {
        position: unset;
    }
    .my-video ul li {
        width: 50px;
    }
    .call-users ul li {
        width: 50px;
    }
    .call-mute {
        font-size: 20px;
        height: 50px;
        line-height: 50px;
        width: 50px;
    }
    .call-duration {
        font-size: 24px;
    }
    .voice-call-avatar .call-avatar {
        height: 100px;
        width: 100px;
    }
    .user-tabs {
        margin-top: 1.5rem;
    }
    .user-tabs .nav-tabs > li > a {
        border-left: 2px solid transparent;
        border-bottom: 0;
        padding: .5rem 1rem;
    }
    .user-tabs .nav-tabs.nav-tabs-bottom > li > a.active,
    .user-tabs .nav-tabs.nav-tabs-bottom > li > a.active:hover,
    .user-tabs .nav-tabs.nav-tabs-bottom > li > a.active:focus {
        border-left-width: 2px;
        color: #20c0f3;
    }
    .doctor-widget {
        -ms-flex-direction: column;
        flex-direction: column;
        text-align: center;
    }
    .doc-info-right {
        margin-left: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
    .doc-info-left {
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .clinic-services {
        display: none;
    }
    .doctor-img {
        margin: 0 auto 20px;
    }
    .doctor-action {
        justify-content: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
    }
    .row.row-grid > div {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }
    .breadcrumb-bar .breadcrumb-title {
        font-size: 18px;
    }
    .dash-widget h6 {
        font-size: 15px;
    }
    .dash-widget h3 {
        font-size: 20px;
    }
    .dash-widget p {
        font-size: 13px;
    }
    .doctor-widget .doc-name {
        font-size: 18px;
    }
    .exp-title, .booking-total ul li span, .booking-total ul li .total-cost {
        font-size: 14px;
    }
    .invoice-item .customer-text {
        font-size: 16px;
    }
    .call-wrapper {
        height: calc(100vh - 115px);
    }
    .appointment-tab .nav-tabs {
        padding: 1.5rem;
    }
    .submit-btn-bottom {
        margin-bottom: 20px;
    }
    .service-list ul li {
        width: 50%;
    }
}

@media only screen and (max-width: 575.98px) {
    body {
        font-size: 0.8125rem;
    }
    h1, .h1 {
        font-size: 1.75rem;
    }
    h2, .h2 {
        font-size: 1.5rem;
    }
    h3, .h3 {
        font-size: 1.25rem;
    }
    h4, .h4 {
        font-size: 1rem;
    }
    h5, .h5 {
        font-size: 0.875rem;
    }
    h6, .h6 {
        font-size: 0.75rem;
    }
    .card {
        margin-bottom: 0.9375rem;
    }
    .card-body {
        padding: 1.25rem;
    }
    .card-header {
        padding: .75rem 1.25rem;
    }
    .card-footer {
        padding: .75rem 1.25rem;
    }
    .header-nav {
        padding-left: 15px;
        padding-right: 15px;
    }
    .header-navbar-rht {
        display: none;
    }
    .main-nav li.login-link {
        display: block;
    }
    .navbar-header {
        width: 100%;
    }
    #mobile_btn {
        left: 0;
        margin-right: 0;
        padding: 0 15px;
        position: absolute;
        z-index: 99;
    }
    .navbar-brand.logo {
        width: 100%;
        text-align: center;
        margin-right: 0;
    }
    .navbar-brand.logo img {
        height: 40px;
    }
    .search-box form {
        display: block;
    }
    .search-box .search-location {
        width: 100%;
        -ms-flex: none;
        flex: none;
    }
    .search-box .search-info {
        width: 100%;
        -ms-flex: none;
        flex: none;
    }
    .banner-wrapper .banner-header h1 {
        font-size: 28px;
    }
    .slick-next {
        right: 0px;
    }
    .section-header h2 {
        font-size: 1.5rem;
    }
    .section-header .sub-title {
        font-size: 0.875rem;
    }
    .speicality-item p {
        font-size: 0.875rem;
    }
    .section-header p {
        font-size: 0.9375rem;
    }
    .footer-title {
        font-size: 1.125rem;
    }
    .booking-schedule.schedule-widget {
        overflow-x: auto;
    }
    .booking-schedule.schedule-widget > div {
        width: 730px;
    }
    .booking-schedule .day-slot ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .booking-schedule .day-slot li {
        -ms-flex: 0 0 100px;
        flex: 0 0 100px;
        width: 100px;
    }
    .booking-schedule .time-slot ul {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }
    .booking-schedule .time-slot li {
        -ms-flex: 0 0 100px;
        flex: 0 0 100px;
        width: 100px;
    }
    .booking-schedule .time-slot li .timing span {
        display: inline-block;
    }
    .booking-schedule .day-slot li.right-arrow {
        right: -20px;
    }
    .booking-doc-info .booking-doc-img {
        width: 70px;
    }
    .booking-doc-info .booking-doc-img img {
        height: 70px;
        width: 70px;
    }
    .voice-call-avatar .call-avatar {
        height: 80px;
        width: 80px;
    }
    .call-duration {
        display: block;
        margin-top: 0;
        margin-bottom: 10px;
        position: inherit;
    }
    .end-call {
        margin-top: 10px;
        position: inherit;
    }
    .user-tabs .med-records {
        min-width: 110px;
    }
    .pagination-lg .page-link {
        font-size: 1rem;
        padding: 0.5rem 0.625rem;
    }
    .row.row-grid > div {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
    .edit-link {
        font-size: 14px;
        margin-top: 2px;
    }
    .invoice-content {
        padding: 1.25rem;
    }
    .change-avatar .profile-img img {
        height: 80px;
        width: 80px;
    }
    .submit-btn-bottom {
        margin-bottom: 0.9375rem;
    }
    .service-list ul li {
        width: 100%;
    }
}

@media only screen and (max-width:479px) {
    .section-search {
        min-height: 410px;
        padding: 30px 15px;
    }
    .specialities-slider .slick-slide {
        margin-right: 10px;
    }
    .speicality-img {
        width: 120px;
        height: 120px;
    }
    .speicality-img img {
        width: 50px;
    }
    .clinic-booking a.view-pro-btn {
        width: 100%;
        margin-bottom: 15px;
    }
    .clinic-booking a.apt-btn {
        width: 100%;
    }
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-name,
    .chat-cont-left .chat-users-list a.media .media-body > div:first-child .user-last-chat {
        max-width: 160px;
    }
    .section-features, .section-features, .section-specialities {
        background-color: #fff;
        padding: 30px 0;
    }
    .login-header h3 a {
        color: #0de0fe;
        float: none;
        font-size: 15px;
        margin-top: 10px;
        text-align: center;
        display: block;
    }
    .login-header h3 {
        text-align: center;
    }
    .appointments .appointment-list {
        text-align: center;
    }
    .appointment-list .profile-info-widget {
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .appointment-list .profile-info-widget {
        text-align: center;
    }
    .appointment-list .profile-info-widget .booking-doc-img {
        margin: 0 0 15px;
    }
    .appointment-list .profile-info-widget .booking-doc-img img {
        border-radius: 50%;
        height: 100px;
        width: 100px;
    }
    .appointment-list .profile-det-info {
        margin-bottom: 15px;
    }
    .appointments .appointment-action {
        margin-top: 0;
    }
    .user-tabs .nav-tabs .nav-item {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
    }
    .review-listing .recommend-btn span {
        display: block;
        margin-bottom: 10px;
    }
    .review-listing > ul li .comments-reply {
        margin-left: 0;
    }
    .schedule-nav .nav-tabs li {
        display: block;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        margin-right: 0;
    }
    .fc-header-toolbar .fc-left {
        margin-bottom: 10px;
    }
    .fc-header-toolbar .fc-right {
        margin-bottom: 10px;
    }
}
        </style>
        <style>
            .badge {
                height: auto;
                width: auto;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #009efb;
                color: #fff;
                display: inline-block;
                font-size: 14px;
                font-weight: normal;
                border-radius: 0;
                cursor: default;
                float: left;
                margin-right: 5px;
                margin-top: 5px;
                padding: 11px 15px;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                color: #fff;
            }

            .select2-container--default .select2-search--inline .select2-search__field {
                margin-top: 14px;
            }
            /*.bootstrap-tagsinput .tag {*/
            /*    background-color: #20c0f3;*/
            /*    color: #fff;*/
            /*    display: inline-block;*/
            /*    font-size: 14px;*/
            /*    font-weight: normal;*/
            /*    margin-right: 2px;*/
            /*    padding: 11px 15px;*/
            /*    border-radius: 0;*/
            /*}*/
        </style>
    @endpush
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Shop Settings')}}
                    <a href="{{ route('shop.visit', $shop->slug) }}" class="btn btn-link btn-sm" target="_blank">({{ translate('Visit Shop')}})<i class="la la-external-link"></i>)</a>
                </h1>
            </div>
        </div>
    </div>






    <form action="{{route('seller.shop.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <input type="hidden" name="user_id" value="{{ $shop->user_id }}">
        <!-- Basic Information -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->logo !== null) {{ uploaded_asset($shop->logo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload" name="logo">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic Information -->

        <!-- About Me -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Me</h4>
                <div class="form-group mb-0">
                    <label>Biography</label>
                    <textarea class="form-control" rows="5" name="about_me">{{$shop->about_me}}</textarea>
                </div>
            </div>
        </div>
        <!-- /About Me -->

        <!-- Clinic Info -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Info</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $shop->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shop Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $shop->address }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                </div>
                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload Banner</span>
                                        <input type="file" class="upload" name="banner">
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Shop Banner</label>--}}
{{--                            <form action="#" class="dropzone"></form>--}}
{{--                        </div>--}}
{{--                        <div class="upload-wrap">--}}
{{--                            <div class="upload-images">--}}
{{--                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($shop->sliders !== null) {{ uploaded_asset($shop->sliders) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">--}}
{{--                                <a href="javascript:void(0);" class="btn btn-icon-dp btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /Clinic Info -->

        <!-- Contact Details -->
        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Contact Details</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" class="form-control" name="delivery_pickup_longitude" value="{{ $shop->delivery_pickup_longitude }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Latitude</label>
                            <input type="text" class="form-control" name="delivery_pickup_latitude" value="{{ $shop->delivery_pickup_latitude }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Contact Details -->

        <!-- Pricing -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Seller Level</h4>

                <div class="form-group row" id="seller_level">
                    <label class="col-md-2 col-form-label">{{ translate('Seller Level') }}</label>
                    <div class="col-md-10">
                        <select class="form-control aiz-selectpicker111" name="seller_level_id" id="seller_level_id">
                            @if(isset($seller_levels) && count($seller_levels))
                            @foreach ($seller_levels as $seller_level)
                                <option value="{{ $seller_level->id }}" <?= $shop->seller_level_id == $seller_level->id ? 'selected' : '' ?>>₹{{ $seller_level->commission }}/min</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="seller_tag">
                    <label class="col-md-2 col-form-label">{{ translate('Seller Tag') }}</label>
                    <div class="col-md-10">
                        <select class="form-control aiz-selectpicker111" name="seller_tag_id" id="seller_tag_id">
                            @if(isset($seller_tags) && count($seller_tags))
                            @foreach ($seller_tags as $seller_tag)
                                <option value="{{ $seller_tag->id }}" <?= $shop->seller_tag_id == $seller_tag->id ? 'selected' : '' ?>>{{ $seller_tag->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <h4 class="card-title">Meta Data</h4>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Title') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Meta Title')}}" name="meta_title" value="{{ $shop->meta_title }}" required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Description') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="meta_description" rows="3" class="form-control mb-3" required>{{ $shop->meta_description }}</textarea>
                    </div>
                </div>
                <?php 
                /*<div class="form-group mb-0">
                    <div id="pricing_select">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="1" checked>
                            <label class="custom-control-label" for="price_free">Beauty Exper</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="price_custom" name="rating_option" value="2" class="custom-control-input">
                            <label class="custom-control-label" for="price_custom">Senior Beauty Expert</label>
                        </div>
                    </div>

                </div>*/
                ?>

            </div>
        </div>
        <!-- /Pricing -->

        <!-- Services and Specialization -->
        <div class="card services-card">
            <div class="card-body">
                <h4 class="card-title">Services and Specialization</h4>
                <div class="form-group">
                    <label>Services</label>
                    @php
                        $sps = json_decode($shop->service_id);
                    @endphp
                    <select name="service_id[]" class="input-tags form-control" id="select2-dropdown"  multiple="multiple">
                        @foreach($products as $product)
                            @if($sps)
                                @foreach($sps as $ssd)
                                    <option value="{{$product->id}}" {{$product->id == $ssd ? 'selected' : ''}}>{{$product->name}}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
    {{--                <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="Tooth cleaning " id="services">--}}
                    <small class="form-text text-muted">Note : Type & Press enter to add new services</small>
                </div>
                <div class="form-group mb-0">
                    <label>Specialization </label>
    {{--                <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="Children Care,Dental Care" id="specialist">--}}
                    <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="{{$shop->specialization}}" id="specialist">
                    <small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
                </div>
            </div>
        </div>
        <!-- /Services and Specialization -->

        <!-- Education -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Education</h4>
                <div class="education-info">
                    @forelse($edus as $edu)
                        <div id="i" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row education-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Degree</label>
                                                <input type="text" class="form-control" name="education[0][degree]" value="{{$edu->degree}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>College/Institute</label>
                                                <input type="text" class="form-control" name="education[0][college]" value="{{$edu->college}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="text" class="form-control" name="education[0][year]" value="{{$edu->year}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($edu->photo !== null) {{ uploaded_asset($edu->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="education[0][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$edu->photo}}" name="education[0][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row education-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Degree</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][degree]" value="{{$edu->degree}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>College/Institute</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][college]" value="{{$edu->college}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Year of Completion</label>
                                                <input type="text" class="form-control" name="education[{{$loop->index}}][year]" value="{{$edu->year}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($edu->photo !== null) {{ uploaded_asset($edu->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="education[{{$loop->index}}][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$edu->photo}}" name="education[{{$loop->index}}][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="i" data-id="0"></div>
                        <div class="row form-row education-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input type="text" class="form-control" name="education[0][degree]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>College/Institute</label>
                                            <input type="text" class="form-control" name="education[0][college]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Year of Completion</label>
                                            <input type="text" class="form-control" name="education[0][year]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="education[0][photo]">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{null}}" name="education[0][prev_photo]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Education -->

        <!-- Experience -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Experience</h4>
                <div class="experience-info">
                    @forelse($exps as $exp)
                        <div id="ei" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row experience-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="experience[0][name]" value="{{$exp->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" class="form-control" name="experience[0][from]" value="{{$exp->from}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="text" class="form-control" name="experience[0][to]" value="{{$exp->to}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="experience[0][designation]" value="{{$exp->designation}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($exp->photo !== null) {{ uploaded_asset($exp->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="experience[0][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$exp->photo}}" name="experience[0][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row experience-cont">
                                <div class="col-12 col-md-10 col-lg-11">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][name]" value="{{$exp->name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][from]" value="{{$exp->from}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][to]" value="{{$exp->to}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" name="experience[{{$loop->index}}][designation]" value="{{$exp->designation}}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($exp->photo !== null) {{ uploaded_asset($exp->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                                    </div>
                                                    <div class="upload-img">
                                                        <div class="change-photo-btn">
                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                            <input type="file" class="upload" name="experience[{{$loop->index}}][photo]">
                                                        </div>
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$exp->photo}}" name="experience[{{$loop->index}}][prev_photo]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="ei" data-id="0"></div>
                        <div class="row form-row experience-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" class="form-control" name="experience[0][name]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" class="form-control" name="experience[0][from]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="text" class="form-control" name="experience[0][to]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="experience[0][designation]" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="experience[0][photo]">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{null}}" name="experience[0][prev_photo]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Experience -->

        <!-- Awards -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Awards</h4>
                <div class="awards-info">
                    @forelse($awards as $awd)
                        <div id="a" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row awards-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Awards</label>
                                        <input type="text" class="form-control" name="awards[0][award]" value="{{$awd->award}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="awards[0][year]" value="{{$awd->year}}" required>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row awards-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Awards</label>
                                        <input type="text" class="form-control" name="awards[{{$loop->index}}][award]" value="{{$awd->award}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="awards[{{$loop->index}}][year]" value="{{$awd->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="a" data-id="0"></div>
                        <div class="row form-row awards-cont">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Awards</label>
                                    <input type="text" class="form-control" name="awards[0][award]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="awards[0][year]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Awards -->

        <!-- Memberships -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Memberships</h4>
                <div class="membership-info">
                    @forelse($memberships as $member)
                        <div id="m" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row membership-cont">
                                <div class="col-12 col-md-10 col-lg-5">
                                    <div class="form-group">
                                        <label>Memberships</label>
                                        <input type="text" class="form-control" name="memberships[0][membership]" value="{{$member->membership}}" required>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row form-row membership-cont">
                                <div class="col-12 col-md-10 col-lg-5">
                                    <div class="form-group">
                                        <label>Memberships</label>
                                        <input type="text" class="form-control" name="memberships[{{$loop->index}}][membership]" value="{{$member->membership}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="m" data-id="0"></div>
                        <div class="row form-row membership-cont">
                            <div class="col-12 col-md-10 col-lg-5">
                                <div class="form-group">
                                    <label>Memberships</label>
                                    <input type="text" class="form-control" name="memberships[0][membership]" required>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Memberships -->

        <!-- Registrations -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registrations</h4>
                <div class="registrations-info">
                    @forelse($regs as $reg)
                        <div id="r" data-id="{{$loop->count - 1}}"></div>
                        @if($loop->first)
                            <div class="row form-row reg-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Registrations</label>
                                        <input type="text" class="form-control" name="regs[0][registration]" value="{{$reg->registration}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="regs[0][year]" value="{{$reg->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($reg->photo !== null) {{ uploaded_asset($reg->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="regs[0][photo]">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$reg->photo}}" name="regs[0][prev_photo]">
                                </div>
                            </div>
                        @else
                            <div class="row form-row reg-cont">
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Registrations</label>
                                        <input type="text" class="form-control" name="regs[{{$loop->index}}][registration]" value="{{$reg->registration}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" class="form-control" name="regs[{{$loop->index}}][year]" value="{{$reg->year}}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 col-lg-1">
                                    <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="@if ($reg->photo !== null) {{ uploaded_asset($reg->photo) }} @else {{ static_asset('assets/img/placeholder.jpg') }} @endif" alt="{{ $shop->name }}" class="lazyload">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="regs[{{$loop->index}}][photo]">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$reg->photo}}" name="regs[{{$loop->index}}][prev_photo]">
                                </div>
                            </div>
                        @endif
                    @empty
                        <div id="r" data-id="0"></div>
                        <div class="row form-row reg-cont">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Registrations</label>
                                    <input type="text" class="form-control" name="regs[0][registration]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="regs[0][year]" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="profile-img">
                                            <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ static_asset('assets/img/placeholder.jpg') }}" alt="{{ $shop->name }}" class="lazyload">
                                        </div>
                                        <div class="upload-img">
                                            <div class="change-photo-btn">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" class="upload" name="regs[0][photo]">
                                            </div>
                                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{null}}" name="regs[0][prev_photo]">
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="add-more">
                    <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
                </div>
            </div>
        </div>
        <!-- /Registrations -->

        <div class="card contact-card">
            <div class="card-body">
                <h4 class="card-title">Social Media</h4>
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{ $shop->facebook }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{ $shop->instagram }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Google</label>
                            <input type="text" class="form-control" name="google" value="{{ $shop->google }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $shop->twitter }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{ $shop->youtube }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-section submit-btn-bottom">
            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div>
    </form>






















@endsection

@section('script')
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
    <!-- Select2 JS -->
    <script src="{{asset('new/assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Dropzone JS -->
    <script src="{{asset('new/assets/plugins/dropzone/dropzone.min.js')}}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="{{asset('new/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>

    <!-- Profile Settings JS -->
    <script src="{{asset('new/assets/js/profile-settings.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('new/assets/js/script.js')}}"></script>
    <script>
        $('#select2-dropdown').select2({
            placeholder: "Enter Services",
            allowClear: true
        });
        function initMap()
        {
            var options ={
                zoom:8,
                center:{lat:28.6862738,lng:77.2217831}
            }
            var map =  new google.maps.Map(document.getElementById('map'),options);

            var marker = new google.maps.Marker({
                position: {
                    lat:28.6862738,
                    lng:77.2217831
                },
                map: map,
                draggable: false

            });
            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));
            google.maps.event.addListener(searchBox,'places_changed',function(){
                var places = searchBox.getPlaces();
                var bounds =  new google.maps.LatLngBounds();
                var i,place;
                for(i=0; place=places[i];i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                map.fitBounds(bounds);
                map.setZoom(15);

            });
            google.maps.event.addListener(marker,'position_changed',function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);

            });
        }

    </script>
    <script  async defer
             src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpgVwmJo0oG5ZfGKnkdiDCy75ELgptvC8&libraries=places&callback=initMap">
    </script>


    @if (get_setting('google_map') == 1)

        @include('frontend.partials.google_map')

    @endif

@endsection
