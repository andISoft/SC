@push('js')
  <script src="https://checkout.culqi.com/v2"></script>
  <script>
    window.culqi_pk = '{{ env('CULQI_PK') }}'
  </script>
  <script src="{{ mix('js/site/pages/cart.js') }}"></script>
@endpush

@extends('layouts.site')

@section('content')

  <cart :artcls="{{ $articles->toJson() }}"></cart>

@endsection

@push('js')
  <script>``
    var reserve

    function setReserve( reserve ) {
      this.reserve = reserve
    }

    function culqi() {
      console.log('AUXILIOOOOOO! 1')
      if (Culqi.token) {
        console.log('AUXILIOOOOOO! 2')
        var token = Culqi.token.id;
        $.ajax({
          type:'POST',
          url: '/checkout',
          data: JSON.stringify({
            "source_id": Culqi.token.id,
            // "installments": Culqi.token.metadata.installments,
            "amount": reserve.total,
            "currency_code": "PEN",
            "reserve" : reserve
          }),
          contentType: "application/json",
          beforeSend: function() {
            console.log('AUXILIOOOOOO! 3')
          },
          error: function() {

          }
        }).done(function(response) {
          console.log(response)
          if (response.success) {
            UIkit.notification({
              message: response.message,
              status: 'success',
              pos: 'bottom-center',
              timeout: 4000
            });
            // setTimeout(function() {
            //   document.location.href = "/";
            // }, 2000)
          } else {
            UIkit.notification({
              message: response.message,
              status: 'danger',
              pos: 'bottom-center',
              timeout: 5000
            });
          }
        });
      } else {

      }
    };
  </script>
@endpush
