<template>
  <div>
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#">
              <i class="fa fa-circle text-success"></i> Online
            </a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN MENU</li>
          <li class="treeview" v-for="menu in menus" :key="menu" @click="menuClick(menu.link)">
            <a href="javascript:void(0);">
              <i :class="menu.icon"></i>
              <span>{{menu.menuname}}</span>
              <span class="pull-right-container">
                <i class='fa fa-angle-left pull-right'></i>
              </span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      menus: [
        { menuname: "DashBoard", icon: "fa fa-dashboard" , link : "home"},
        { menuname: "Report", icon: "fa fa-signal" , link : "home"},
        { menuname: "Product", icon: "fa fa-tag"  , link : "product"},
        { menuname: "Supplyier", icon: "fa fa-cab", link : "home" },
        { menuname: "Order", icon: "fa fa-cart-arrow-down" , link : "home" },
        { menuname: "Customer", icon: "fa fa-user" ,  link : "home"},
        { menuname: "Inventory", icon: "fa fa-briefcase", link : "home" },
        { menuname: "Setting", icon: "fa fa-cog" , link : "home"}
      ]
    };
  },
  methods : {
    menuClick(link){
      alert(link);
    }
  }
};
</script>

<style>
</style>