<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Vos dernières factures
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        @foreach($website->invoices as $invoice)
            <div class="kt-widget4">
                <div class="kt-widget4__item">
                    <div class="kt-widget4__pic kt-widget4__pic--icon">
                        <img src="{{asset('application/media/files/pdf.svg')}}" alt="">
                    </div>
                    <a href="{{route('admin.invoice.download',['website'=>$website,'invoice'=>$invoice])}}" class="kt-widget4__title">
                        Facture du {{date('d/m/Y', strtotime($invoice->created_at))}} payé le {{date('d/m/Y', strtotime($invoice->paid_at))}}
                    </a>
                    <div class="kt-widget4__tools">
                        <a href="#" class="btn btn-clean btn-icon btn-sm">
                            <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>