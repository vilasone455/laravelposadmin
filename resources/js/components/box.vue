<template>
  <div>
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{title}}</h3>

          <div class="box-tools pull-right">
            <button
              type="button"
              class="btn btn-box-tool"
              data-widget="collapse"
              data-toggle="tooltip"
              title="Collapse"
            >
              <i class="fa fa-minus"></i>
            </button>
            <button
              type="button"
              class="btn btn-box-tool"
              data-widget="remove"
              data-toggle="tooltip"
              title="Remove"
            >
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <slot></slot>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">Footer</div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>

<script>
export default {

    props : ["title"]

};
</script>

<style>
</style>