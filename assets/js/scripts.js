"use strict";

$(window).on("load", function () {
  $(".loader").fadeOut("slow");
});

// Global
$(function () {

  // tooltip
  $("[data-toggle='tooltip']").tooltip();

  // popover
  $('[data-toggle="popover"]').popover({
    container: "body"
  });

  // Select2
  if (jQuery().select2) {
    $(".select2").select2();
  }

  // Selectric
  if (jQuery().selectric) {
    $(".selectric").selectric({
      disableOnMobile: false,
      nativeOnMobile: false
    });
  }

 


  // Dismiss function
  $("[data-dismiss]").each(function () {
    var me = $(this),
      target = me.data("dismiss");

    me.click(function () {
      $(target).fadeOut(function () {
        $(target).remove();
      });
      return false;
    });
  });

  // Collapsable
  $("[data-collapse]").each(function () {
    var me = $(this),
      target = me.data("collapse");

    me.click(function () {
      $(target).collapse("toggle");
      $(target).on("shown.bs.collapse", function () {
        me.html('<i class="fas fa-minus"></i>');
      });
      $(target).on("hidden.bs.collapse", function () {
        me.html('<i class="fas fa-plus"></i>');
      });
      return false;
    });
  });

  // Background
  $("[data-background]").each(function () {
    var me = $(this);
    me.css({
      backgroundImage: "url(" + me.data("background") + ")"
    });
  });

  // Custom Tab
  $("[data-tab]").each(function () {
    var me = $(this);

    me.click(function () {
      if (!me.hasClass("active")) {
        var tab_group = $('[data-tab-group="' + me.data("tab") + '"]'),
          tab_group_active = $(
            '[data-tab-group="' + me.data("tab") + '"].active'
          ),
          target = $(me.attr("href")),
          links = $('[data-tab="' + me.data("tab") + '"]');

        links.removeClass("active");
        me.addClass("active");
        target.addClass("active");
        tab_group_active.removeClass("active");
      }
      return false;
    });
  });

  // Bootstrap 4 Validation
  $(".needs-validation").submit(function () {
    var form = $(this);
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.addClass("was-validated");
  });

  // alert dismissible
  $(".alert-dismissible").each(function () {
    var me = $(this);

    me.find(".close").click(function () {
      me.alert("close");
    });
  });

  if ($(".main-navbar").length) {
  }

  // Image cropper
  $("[data-crop-image]").each(function (e) {
    $(this).css({
      overflow: "hidden",
      position: "relative",
      height: $(this).data("crop-image")
    });
  });

  // Slide Toggle
  $("[data-toggle-slide]").click(function () {
    let target = $(this).data("toggle-slide");

    $(target).slideToggle();
    return false;
  });

  // Dismiss modal
  $("[data-dismiss=modal]").click(function () {
    $(this)
      .closest(".modal")
      .modal("hide");

    return false;
  });

  // Width attribute
  $("[data-width]").each(function () {
    $(this).css({
      width: $(this).data("width")
    });
  });

  // Height attribute
  $("[data-height]").each(function () {
    $(this).css({
      height: $(this).data("height")
    });
  });

  // Chocolat
  if ($(".chocolat-parent").length && jQuery().Chocolat) {
    $(".chocolat-parent").Chocolat();
  }

  // Sortable card
  if ($(".sortable-card").length && jQuery().sortable) {
    $(".sortable-card").sortable({
      handle: ".card-header",
      opacity: 0.8,
      tolerance: "pointer"
    });
  }

  // Daterangepicker
  if (jQuery().daterangepicker) {
    if ($(".datepicker").length) {
      $(".datepicker").daterangepicker({
        locale: { format: "YYYY-MM-DD" },
        singleDatePicker: true
      });
    }
    if ($(".datetimepicker").length) {
      $(".datetimepicker").daterangepicker({
        locale: { format: "YYYY-MM-DD hh:mm" },
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true
      });
    }
    if ($(".daterange").length) {
      $(".daterange").daterangepicker({
        locale: { format: "YYYY-MM-DD" },
        drops: "down",
        opens: "right"
      });
    }
  }

  // Timepicker
  if (jQuery().timepicker && $(".timepicker").length) {
    $(".timepicker").timepicker({
      icons: {
        up: "fas fa-chevron-up",
        down: "fas fa-chevron-down"
      }
    });
  }

  $("#mini_sidebar_setting").on("change", function () {
    var _val = $(this).is(":checked") ? "checked" : "unchecked";
    if (_val === "checked") {
      toggle_sidebar_mini(true);
    } else {
      toggle_sidebar_mini(false);
    }
  });
  $("#sticky_header_setting").on("change", function () {
    if ($(".main-navbar")[0].classList.contains("sticky")) {
      toggle_sticky_header(false);
    } else {
      toggle_sticky_header(true);
    }
  });

  $(".theme-setting-toggle").on("click", function () {
    if ($(".theme-setting")[0].classList.contains("active")) {
      $(".theme-setting")[0].classList.remove("active");
    } else {
      $(".theme-setting")[0].classList += " active";
    }
  });

  // full screen call

  $(document).on("click", ".fullscreen-btn", function (e) {
    if (
      !document.fullscreenElement && // alternative standard method
      !document.mozFullScreenElement &&
      !document.webkitFullscreenElement &&
      !document.msFullscreenElement
    ) {
      // current working methods
      if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen(
          Element.ALLOW_KEYBOARD_INPUT
        );
      }
    } else {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    }
  });

  // setting sidebar

  $(".settingPanelToggle").on("click", function () {
    $(".settingSidebar").toggleClass("showSettingPanel");
  }),
    $(".page-wrapper").on("click", function () {
      $(".settingSidebar").removeClass("showSettingPanel");
    });

  // close right sidebar when click outside
  var mouse_is_inside = false;
  $(".settingSidebar").hover(
    function () {
      mouse_is_inside = true;
    },
    function () {
      mouse_is_inside = false;
    }
  );

  $("body").mouseup(function () {
    if (!mouse_is_inside) $(".settingSidebar").removeClass("showSettingPanel");
  });

  // theme change event
  $(".choose-theme li").on("click", function () {
    var bodytag = $("body"),
      selectedTheme = $(this),
      prevTheme = $(".choose-theme li.active").attr("title");

    $(".choose-theme li").removeClass("active"),
      selectedTheme.addClass("active");
    $(".choose-theme li.active").data("theme");

    bodytag.removeClass("theme-" + prevTheme);
    bodytag.addClass("theme-" + $(this).attr("title"));
  });

  // dark light sidebar button setting
  $(".sidebar-color input:radio").change(function () {
    if ($(this).val() == "1") {
      $("body").removeClass("dark-sidebar");
      $("body").addClass("light-sidebar");
    } else {
      $("body").removeClass("light-sidebar");
      $("body").addClass("dark-sidebar");
    }
  });

  // dark light layout button setting
  $(".layout-color input:radio").change(function () {
    if ($(this).val() == "1") {
      $("body").removeClass();
      $("body").addClass("light");
      $("body").addClass("light-sidebar");
      $("body").addClass("theme-purple");

      $(".choose-theme li").removeClass("active");
      $(".choose-theme li[title|='white']").addClass("active");
      $(".selectgroup-input[value|='1']").prop("checked", true);
    } else {
      $("body").removeClass();
      $("body").addClass("dark");
      $("body").addClass("dark-sidebar");
      $("body").addClass("theme-black");

      $(".choose-theme li").removeClass("active");
      $(".choose-theme li[title|='black']").addClass("active");
      $(".selectgroup-input[value|='2']").prop("checked", true);
    }
  });

  // restore default to dark theme
  $(".btn-restore-theme").on("click", function () {
    //remove all class from body
    $("body").removeClass();
    jQuery("body").addClass("light");
    jQuery("body").addClass("light-sidebar");
    jQuery("body").addClass("theme-purple");

    // set default theme
    $(".choose-theme li").removeClass("active");
    $(".choose-theme li[title|='purple']").addClass("active");

    $(".select-layout[value|='1']").prop("checked", true);
    $(".select-sidebar[value|='2']").prop("checked", true);
    toggle_sidebar_mini(false);
    $("#mini_sidebar_setting").prop("checked", false);
    $("#sticky_header_setting").prop("checked", true);
    toggle_sticky_header(true);
  });

  //start up class add

  //add default class on body tag
  jQuery("body").addClass("light");
  jQuery("body").addClass("light-sidebar");
  jQuery("body").addClass("theme-purple");
  // set theme default color
  $(".choose-theme li").removeClass("active");
  $(".choose-theme li[title|='white']").addClass("active");
  //set default dark or light layout(1=light, 2=dark)
  $(".select-layout[value|='1']").prop("checked", true);
  //set default dark or light sidebar(1=light, 2=dark)
  $(".select-sidebar[value|='1']").prop("checked", true);
  // sticky header default set to true
  $("#sticky_header_setting").prop("checked", true);
});

