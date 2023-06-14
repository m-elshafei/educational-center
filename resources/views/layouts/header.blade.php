{{-- @include('layouts.app')   --}}
<html>
    <?php
    use Carbon\Carbon;
    use Alkoumi\LaravelHijriDate\Hijri;
    $date = Carbon::now();
    $today = Hijri::DateIndicDigits('l ، j F ، Y', $date);
    $today .= ' هجري ';
    $today .= ' | ';
    $date = Carbon::today()->locale('ar');
    $today .= $date->translatedFormat('d F Y');
    $today .= ' ميلادي ';
    ?>
    <footer class="footer footer-light">
            <p class="clearfix mb-0">
            <span class="float-md-end d-none d-md-block"><i data-feather="heart">{{ $today }}</i></span>
            </p>
    </footer>

  </html>
