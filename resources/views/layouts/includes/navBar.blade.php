<a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn bnt-outline rounded-pill"> <i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-user"></i>User </a>
<a href="{{ route('orders.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-box"></i>Orders </a>
<a href="{{ route('products.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-shop"></i> Products</a>
<a href="{{ route('transactions.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-dollar"></i>Transactions </a>
<a href="{{ route('cashiers.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-laptop"></i>Cashier </a>
<a href="{{ route('reports.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-file"></i>Report </a>
<a href="{{ route('customers.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-users"></i>Customers </a>
<a href="{{ route('incomings.index') }}" class="btn bnt-outline rounded-pill"> <i class="fa fa-truck"></i>Incoming </a>


<style>
    .btn-outline{
        border-color: #008B8B; 
        color: #008B8B;
    }
    .btn-outline:hover{
        background: #008B8B; 
        color: #fff;
    }

</style> 