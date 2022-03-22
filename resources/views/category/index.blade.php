@extends('layout.conquer2')
@section('content')
   <h3 class="page-title">
		DAFTAR KATEGORI
	</h3>
   <div class="page-bar">
      <ul class="page-breadcrumb">
         <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
         </li>
         <li>
            <a href="#">Kategori</a>
            <i class="fa fa-angle-right"></i>
         </li>
      </ul>
      <div class="page-toolbar">
         <!-- tempat action button -->
      </div>
   </div>
   <div class="portlet">
      <div class="portlet-title"><b>Kategori</b></div>
      <div class="portlet-body">
          <div class="table-responsive">
            <table class="table table-striped table-responsive">
               <thead>
                  <tr>
                     <th>Nama</th>
                     <th>Description</th>
                     <th>Obat - obat</th>
                     <th>Detail</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($hasil as $d)
                  <tr>
                     <td>{{ $d->name }}</td>
                     <td>{{ $d->description }}</td>
                     <td>
                        @foreach ($d->medicines as $m)
                           {{ $m->generic_name }} ({{ $m->form }})<br>
                        @endforeach
                     </td>
                     <td>
                         <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'
                        onclick='showProducts({{ $d->id }})'>
                           Show Medicines
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
   
   <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
      <div class="modal-dialog modal-wide">
         <div class="modal-content" id="showproducts">
            <!--loading animated gif can put here-->
            <img src="{{ asset('assets/img/Spinning cheeseburger.gif') }}" alt="" class="loading">
         </div>
      </div>
   </div>

@endsection

@section('javascript')
<script>
   function showProducts(category_id)
   {
      $.ajax({
         type:'GET',
         url:'{{ url("report/listmedicine/")}}'+"/"+category_id,
         data:{'_token':'<?php echo csrf_token() ?>',
               'category_id':category_id
               },
         success: function(data){
            $('#showproducts').html(data.msg)
         }
      });
   }
</script>

@endsection