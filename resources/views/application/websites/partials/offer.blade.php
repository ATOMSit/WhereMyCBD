<div class="kt-portlet kt-portlet--head-noborder">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h2 class="kt-portlet__head-title  kt-font-danger">
                Votre offre
            </h2>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit-top">
        <div class="kt-section kt-section--space-sm">
            @if($website->offer === 'ecommerce')
                <p class="lead">
                    Vous possédez déjà actuellement la meilleure offre que notre société puisse vous proposer et nous vous en remercions. </p>
            @elseif($website->offer ==='premium')

            @else
                <p class="lead">
                    Vous possédez une offre de découverte de notre application. Vous pouvez a tout moment changer votre offre pour bénéficier davantage
                    d'option. </p>
            @endif
        </div>
        <div class="kt-section kt-section--last">
            <a href="#" class="btn btn-brand btn-sm btn-bold"><i class=""></i>
                Changer d'offre
            </a>&nbsp;
        </div>
    </div>
</div>