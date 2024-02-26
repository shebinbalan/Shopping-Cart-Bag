<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
         Shopping Cart
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('dashboard') ? 'active':''}}  ">
            <a class="nav-link" href="{{url('dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
        
          <li class="nav-item {{Request::is('product') ? 'active':''}}">
            <a class="nav-link" href="{{url('product')}}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add-product') ? 'active':''}}">
            <a class="nav-link" href="{{url('add-product')}}">
              <i class="material-icons">person</i>
              <p>Add Products</p>
            </a>
          </li>
          <!-- <li class="nav-item {{Request::is('') ? 'active':''}}">
            <a class="nav-link" href="{{url('')}}">
              <i class="material-icons">content_paste</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add-product') ? 'active':''}} ">
            <a class="nav-link" href="{{url('users')}}">
              <i class="material-icons">person</i>
              <p>Add Users</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('add-product') ? 'active':''}} ">
            <a class="nav-link" href="{{url('cart')}}">
              <i class="material-icons">person</i>
              <p>Cart List</p>
            </a>
          </li> -->

        
        </ul>
      </div>
    </div>