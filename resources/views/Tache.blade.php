<x-master titre="SectionB" css="{{ asset('mstyle.css') }}" >
<!--notifications-->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Taches : </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

    </div>
  </div>
@if(count($notifications)>0)
    {{-- <div class="text-center"> --}}
        <button type="button" class="btn position-relative" id="liveToastBtn" style="display: flex;position: fixed !important;right: 19px;z-index:1;">
           <i style="font-size: 30px; color:#dc3545 ;" class="bx bx-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-center" style="margin: 5px -9px; padding: 5px 7px;">
              {{ count($notifications) }}
              <span class="visually-hidden">unread notifications</span>
            </span>
          </button>
    {{-- </div> --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @foreach ($notifications as $toast)

            <div id="liveToast{{$toast['id']}}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                    <i style="font-size: 20px;color: #dc3545;padding-right: 9px;" class="bx bx-calendar-exclamation"></i>
                    <strong class="me-auto">N'oubliez pas, la date limite est cette semaine!</strong>
                    <?php $delay = date('Y-m-d', strtotime($toast['date_fin'])); ?>
                   <small>{{$delay}}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-center">
                    <a href="#tachediv{{$toast['id']}}" class="text-decoration-none"> {{$toast['titre']}}</a>
                </div>
            </div>
        @endforeach
    </div>
@endif
<!---->
<br/><div></div>
@include("timeline.time_line2")<br/>
    <div class="container text-center">
        <div class="card mb-3" style="border-radius:3rem; max-width: 100%;">
            <div class="row g-0 rounded-start-4">
              <div class="col-md-8">
                 <div class="card-headaer m-2 "><br/><h5>Formulaire de tâches :</h5></div>
                <div class="card-body">
                    @include("TacheFiles.Creation")
                </div>
              </div>
              <div class="col-md-4" style="margin:auto; ">
                <img src="./imgs/tache1.png" class="img-fluid " alt="...">
              </div>
            </div>
          </div>

        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->

        <div class="row">
            <div class="col-6 col-md-6"><div class="card mb-3" style="max-height: 500px; overflow-y: auto;overflow-x: hidden; min-height: auto;     max-height: 522px;
      overflow-y: auto;
      overflow-x: hidden;
      border-radius: 1rem;
      min-height: 522px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.12);">
              <div class="card-headaer m-2 "><h5>Liste des tâches :</h5></div>
                <div class="row" >
                  <div class="col-12">@include("TacheFiles.Liste")</div>
                </div>
              </div></div>
            <div class="col-6 col-md-6">@include("cld.cldr")</div>
            <!-- <div class="col-6 col-md-4">.col-6 .col-md-4</div> -->
          </div>
<script>
    $(document).ready(function() {
        const toastTriggers = document.querySelectorAll('.toast-trigger');

        toastTriggers.forEach(trigger => {
            const toastId = trigger.getAttribute('data-toast-id');
            const toastLiveExample = document.getElementById('liveToast' + toastId);

            if (toastLiveExample) {
                const toastBootstrap = new bootstrap.Toast(toastLiveExample);
                trigger.addEventListener('click', () => {
                    toastBootstrap.show();
                });
            }
        });

        const allToastsBtn = document.getElementById('liveToastBtn');
        if (allToastsBtn) {
            const allToasts = document.querySelectorAll('.toast');
            allToastsBtn.addEventListener('click', () => {
                allToasts.forEach(toast => {
                    const toastBootstrap = new bootstrap.Toast(toast);
                    toastBootstrap.show();
                });
            });
        }
    });
function updateValue2(id,val) {
document.getElementById('avancement-indice2'+id).innerHTML = val + '%';
}
</script>

</x-master>
