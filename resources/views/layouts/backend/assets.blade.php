<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:200,300,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/all.css') }}" rel="stylesheet" type="text/css">
<?php if (!empty($assets['style'])): ?>
  <?php foreach ($assets['style'] as $style): ?>
    <link href="{{asset($style)}}" rel="stylesheet">
  <?php endforeach ?>
<?php endif ?>
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{ asset('assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/main/bootstrap.bundle.min.js') }}"></script>
<?php if (!empty($assets['script'])): ?>
<?php foreach ($assets['script'] as $script): ?>
  <script src="{{ asset($script) }}"></script>
<?php endforeach ?>
<?php endif ?>
<script src="{{ asset('assets/js/app.js') }}"></script>