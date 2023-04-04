@extends('layouts.index')

@section('Listagem de produtos', 'Dashboard')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

 
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-main user-member justify-content-sm-between ">
<div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
<div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
<h4 class="text-capitalize fw-500 breadcrumb-title">Listagem de produtos</h4>
<span class="sub-title ms-sm-25 ps-sm-25">Home</span>
</div>

<!--Form Buscar --> 
<form action="/" class="d-flex align-items-center user-member__form my-sm-0 my-2">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img//svg/search.svg" alt="search" class="svg">
<input class="form-control me-sm-2 border-0 box-shadow-none" type="search" placeholder="Buscar produto (Nome, descrição)..." aria-label="Search">
</form>
<!--Fim Form Buscar --> 

</div>
<div class="action-btn">

<a href="#" class="btn px-15 btn-primary" data-bs-toggle="modal" data-bs-target="#new-member">
<i class="las la-plus fs-16"></i>Novo Produto</a>


<!--Modal Novo Produto --> 
<div class="modal fade new-member " id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content  radius-xl">
<div class="modal-header">
<h6 class="modal-title fw-500" id="staticBackdropLabel">Novo Produto</h6>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/x.svg" alt="x" class="svg">
</button>
</div>


<div class="modal-body">
<div class="new-member-modal">

<!--Form Novo Pedido --> 
<form action="{{ route('produtos.novoproduto') }}" method="post"  onsubmit="btnsubmit.disabled = true; return true;">
@csrf

<!-- <div class="form-group mb-20">
<input type="text" class="form-control" placeholder="Duran Clayton">
</div> -->

<div class="form-group mb-20">
<label class="mb-15">Nome</label>
<input type="text" class="form-control" placeholder="Nome do produto" name="novoproduto_nome" id="novoproduto_nome" required>
</div>

<div class="form-group mb-20">
<div class="category-member">
<label class="mb-15">Categoria</label>
<select class="js-example-basic-single js-states form-control" id="novoproduto_categoria" name="novoproduto_categoria" required>
<option value="">Selecione abaixo</option>
<option value="Banheiro">Banheiro</option>
<option value="Eletrodomésticos">Eletrodomésticos</option>
<option value="Limpeza">Limpeza</option>
<option value="Movéis">Movéis</option>
</select>
</div>
</div>

<div class="form-group mb-20">
<label class="mb-15">Descrição do produto</label>
<textarea class="form-control" id="novoproduto_descricao" name="novoproduto_descricao" rows="2" placeholder="Descrição do produto (Opcional)"></textarea>
</div>

<div class="form-group quantity-appearance">
<label>Valor</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1">
<img class="svg" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/dollar-sign.svg" alt="">
</span>
</div>
<div class="pt_Quantity">
<input name="novoproduto_valor" id="novoproduto_valor" type="text" maxlength="8" pattern="(?:\.|,|[0-9])*" class="form-control" placeholder="Valor(R$)" onKeyPress="return(moeda2(this,'.',',',event))" data-toggle="tooltip" data-placement="top" title="Preencha o valor do produto" required="required">
</div>
</div>
</div>


<div class="form-group quantity-appearance">
<label>Desconto</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon2">
<img class="svg" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/percent.svg" alt="">
</span>
</div>
<div class="pt_Quantity">
<input type="number" class="form-control" min="0" max="100" step="1" value="0" data-inc="1" name="novoproduto_desconto" id="novoproduto_desconto">
</div>
</div>
</div>

<div class="add-product__body-img px-sm-40 px-20">
<!-- <label for="upload" class="file-upload__label">
<span class="upload-product-img px-10 d-block">
<span class="file-upload">
<img class="svg" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/upload.svg" alt="">
<input id="upload" class="file-upload__input" type="file" name="file-upload">
</span>
<span class="pera">Drag and drop an image</span>
<span>or <a href="#" class="color-secondary">Browse</a> to choose a
file</span>
</span>
</label> -->

<div class="upload-product-media d-flex justify-content-between align-items-center mt-25">
<div class="upload-media-area d-flex">
<img src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/digital-chair.png" alt="img">
<div class=" upload-media-area__title  d-flex flex-wrap align-items-center ms-10">
<div>
<p>Produto imagem.jpg</p>
<span>68.8 KB</span>
</div>
<div class="upload-media-area__btn">
<button type="button" class="transparent rounded-circle wh-30 border-0 color-danger">
<img class="svg" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/svg/trash-2.svg" alt="">
</button>
</div>
</div>
</div>
</div>
</div>


</div>

<div class="button-group d-flex pt-25">
<button type="submit" id="btnsubmit" class="btn btn-primary btn-default btn-squared text-capitalize">Cadastrar novo produto
</button>

<button type="button" class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light" data-bs-dismiss="modal">Cancelar</button>
</div>
</form>
<!--Fim Form Novo Produto --> 

</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<!--Fim Modal Novo Produto --> 



<div class="row">

<!--Inicio Loop Produto --> 
@foreach($produtos as $produto)
<div class="col-md-6 col-sm-12 mb-25">
<div class="media  py-30  ps-30 pe-20 bg-white radius-xl users-list ">
<img class=" me-20 rounded-circle wh-80 bg-opacity-primary" src="https://demo.dashboardmarket.com/hexadash-html/ltr/img/digital-chair.png" alt="Generic placeholder image">
<div class="media-body d-xl-flex users-list-body">
<div class="flex-1 pe-xl-30 users-list-body__title">
<h6 class="mt-0 fw-500">{{$produto->nome}}</h6>
<p class="mb-0">{{$produto->descricao}}</p>
<div class="users-list-body__bottom">
<span><span class="fw-600">Desconto: {{$produto->desconto}} %</span></span>
<span class="ms-15"><span class="fw-600">Valor únitario: R$ {{$produto->valor}}</span></span>
</div>
</div>

<div class="users-list__button mt-xl-0 mt-15">

<form action="{{ route('produtos.viewproduto') }}" method="post">
@csrf
<input type="hidden" name="produto_id" id="produto_id" value="{{$produto->id}}">
<button type="submit" class="border text-capitalize px-25 color-gray transparent shadow2 follow my-xl-0 radius-md">Ver produto</button>
</form>
</div>

</div>
</div>
</div>
@endforeach
<!--Fim Loop Produto --> 

</div>
<!--Fim Row --> 


<div class="row">
<div class="col-12">
<div class="user-pagination">
<div class="d-flex justify-content-md-end justify-content-center mt-1 mb-30">
<nav class="dm-page ">
<ul class="dm-pagination d-flex">
<li class="dm-pagination__item">
<a href="#" class="dm-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
<a href="#" class="dm-pagination__link active"><span class="page-number">1</span></a>
<a href="#" class="dm-pagination__link"><span class="page-number">2</span></a>
<a href="#" class="dm-pagination__link"><span class="page-number">3</span></a>
<a href="#" class="dm-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
<a href="#" class="dm-pagination__option">
</a>
</li>
<li class="dm-pagination__item">
<div class="paging-option">
<select name="page-number" class="page-selection">
<option value="20">20/pagínas</option>
<option value="40">40/pagínas</option>
<option value="60">60/pagínas</option>
</select>
</div>
</li>
</ul>
</nav>
</div>

</div>
</div>
</div>
</div>



@push('scripts')

<script language="javascript">   
function moeda2(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}

 </script> 


@endpush

@endsection