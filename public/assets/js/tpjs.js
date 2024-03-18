function fnPropertyType() {
   var n = $("#hdnProjId").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetPropertyType",
      data: '{"strProjId": "' + n + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessPropertyType,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function OnSuccessPropertyType(n) {
   var t, i;
   $("#PropertyTypeId").html("");
   i = n.d;
   t = "<option value='0' selected='selected'>All<\/option>";
   $(i).each(function () {
      t += "<option value='" + this.strPropertyType + "'>" + this.strPropertyType + "<\/option>"
   });
   $("#PropertyTypeId").append(t)
}

function fnfpcategory() {
   var n = $("#hdnProjId").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpCategory",
      data: '{"strProjId": "' + n + '","strPropertyType": "" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessfpcategory,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function OnSuccessfpcategory(n) {
   var t, i;
   $("#fpcategoryId").html("");
   i = n.d;
   t = "<option value='0' selected='selected'>All<\/option>";
   $(i).each(function () {
      t += "<option value='" + this.strCategory + "'>" + this.strCategory + "<\/option>"
   });
   $("#fpcategoryId").append(t)
}

function fnfpSubcategory() {
   var n = $("#hdnProjId").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpSubCategory",
      data: '{"strProjId": "' + n + '","strPropertyType": "","strCategory": "" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessfpsubcategory,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function OnSuccessfpsubcategory(n) {
   var t, i;
   $("#fpsubcategoryId").html("");
   i = n.d;
   t = "<option value='0' selected='selected'>All<\/option>";
   $(i).each(function () {
      t += "<option value='" + this.strSubCategory + "'>" + this.strSubCategory + "<\/option>"
   });
   $("#fpsubcategoryId").append(t)
}

function fnfpcategorybyPropType() {
   var t = $("#hdnProjId").val().trim(),
      n = $("#PropertyTypeId").val();
   n === "0" && (n = "");
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpCategory",
      data: '{"strProjId": "' + t + '","strPropertyType": "' + n + '" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessfpcategory,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnfpSubcategorybycat() {
   var i = $("#hdnProjId").val().trim(),
      t = $("#PropertyTypeId").val(),
      n;
   t === "0" && (t = "");
   n = $("#fpcategoryId").val();
   n === "0" && (n = "");
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpSubCategory",
      data: '{"strProjId": "' + i + '","strPropertyType": "' + t + '","strCategory": "' + n + '" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessfpsubcategory,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnsearchbyPropType() {
   var n = $("#PropertyTypeId").val(),
      t, i;
   n === "0" && (n = "");
   t = n.trim();
   fnfpcategorybyPropType();
   fnfpSubcategorybycat();
   $("table tbody tr").hide();
   i = $('table tbody tr:not(.notfound) td:contains("' + t + '")').length;
   i > 0 ? $('table tbody tr:not(.notfound) td:contains("' + t + '")').each(function () {
      $(this).closest("tr").show()
   }) : $(".notfound").show();
   $.expr[":"].contains = $.expr.createPseudo(function (n) {
      return function (t) {
         return $(t).text().toUpperCase().indexOf(n.toUpperCase()) >= 0
      }
   })
}

function fnsearchbyCategory() {
   var n = $("#fpcategoryId").val(),
      t, i;
   n === "0" ? n = "" : (t = n.trim(), fnfpSubcategorybycat(), $("table tbody tr").hide(), i = $('table tbody tr:not(.notfound) td:contains("' + t + '")').length, i > 0 ? $('table tbody tr:not(.notfound) td:contains("' + t + '")').each(function () {
      $(this).closest("tr").show()
   }) : $(".notfound").show(), $.expr[":"].contains = $.expr.createPseudo(function (n) {
      return function (t) {
         return $(t).text().toUpperCase().indexOf(n.toUpperCase()) >= 0
      }
   }))
}

function fnsearchbySubCategory() {
   var i = $("#fpsubcategoryId").val(),
      n = i.trim(),
      t;
   $("table tbody tr").hide();
   t = $('table tbody tr:not(.notfound) td:contains("' + n + '")').length;
   t > 0 ? $('table tbody tr:not(.notfound) td:contains("' + n + '")').each(function () {
      $(this).closest("tr").show()
   }) : $(".notfound").show();
   $.expr[":"].contains = $.expr.createPseudo(function (n) {
      return function (t) {
         return $(t).text().toUpperCase().indexOf(n.toUpperCase()) >= 0
      }
   })
}

function fnfloorplanlist() {
   var n = $("#hdnProjId").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetFloorplan",
      data: '{"strProjId": "' + n + '","strPropertyType": "","strCategory": "","strSubCategory": ""}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: OnSuccessFloorplan,
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function OnSuccessFloorplan2(n) {
   var t, i;
   $("#floorplanlstId").html("");
   i = n.d;
   t = "<thead>";
   t += "<tr>";
   t += "<th>Floor Plan<\/th>";
   t += "<th>Category<\/th>";
   t += "<th>Unit Type<\/th>";
   t += "<th>Floor Details<\/th>";
   t += "<th>Sizes<\/th>";
   t += "<th>Type<\/th>";
   t += "<\/tr>";
   t += "<\/thead>";
   t += "<tbody>";
   $(i).each(function () {
      t += "<tr>";
      t += "<td>";
      t += "<a href='" + this.strFloorImage + "'>";
      t += "<img src='" + this.strFloorImage + "' alt='' class='floor-plan img-fluid'/>";
      t += "<\/a>";
      t += "<\/td>";
      t += "<td>";
      t += "<span>" + this.strCategoryCaption + "<\/span>";
      t += "<\/td>";
      t += "<td>";
      t += "<span>" + this.strSubCategoryCaption + "<\/span>";
      t += "<\/td>";
      t += "<td>";
      t += "<span>" + this.strFloorCap + "<\/span>";
      t += "<\/td>";
      t += "<td>";
      t += "<span>" + this.strFloorSize + " " + this.strSizeUnitCaption + "<\/span>";
      t += "<\/td>";
      t += "<td>";
      t += "<span>" + this.strPropertyType + "<\/span>";
      t += "<\/td>";
      t += "<\/tr>"
   });
   t += "<\/tbody>";
   $("#floorplanlstId").append(t)
}

function OnSuccessFloorplan(n) {
   var t, i;
   $("#floorplanlstId").html("");
   i = n.d;
   t = "<thead>";
   t += "<tr>";
   t += "<th>Floor Plan<\/th>";
   t += "<th>Category<\/th>";
   t += "<th>Unit Type<\/th>";
   t += "<th>Floor Details<\/th>";
   t += "<th>Sizes<\/th>";
   t += "<th>Type<\/th>";
   t += "<\/tr>";
   t += "<\/thead>";
   t += "<tbody>";
   $(i).each(function () {
      t += "<tr>";
      t += "<td>";
      t += "<a href='https://manage.tanamiproperties.com/Project/Floor_Image/359/Gallery/3959.jpg'>";
      t += "<img src='https://manage.tanamiproperties.com/Project/Floor_Image/359/Gallery/3959.jpg' alt='abc' class='floor-plan img-fluid'/>";
      t += "<\/a>";
      t += "<\/td>";
      t += "<td><span>Floor Plan<\/span><\/td>";
      t += "<td><span>abc<\/span><\/td>";
      t += "<td><span>Details will be updated soon<\/span><\/td>";
      t += "<td><span>0.00 Sq Ft<\/span><\/td>";
      t += "<td><span>hello<\/span><\/td>";
      t += "<\/tr>"
   });
   t += "<\/tbody>";
   $("#floorplanlstId").append(t)
}

function limitPagging() {
   if ($(".pagination li").length > 7 && ($(".pagination li.active").attr("data-page") <= 3 && ($(".pagination li:gt(5)").hide(), $(".pagination li:lt(5)").show(), $('.pagination [data-page="next"]').show()), $(".pagination li.active").attr("data-page") > 3)) {
      $(".pagination li:gt(0)").hide();
      $('.pagination [data-page="next"]').show();
      for (let n = parseInt($(".pagination li.active").attr("data-page")) - 2; n <= parseInt($(".pagination li.active").attr("data-page")) + 2; n++) $('.pagination [data-page="' + n + '"]').show()
   }
}

function getPagination(n) {
   var t = 1;
   $("#maxRows").on("change", function () {
      var r, i, f, e, u;
      if (t = 1, $(".pagination").find("li").slice(1, -1).remove(), r = 0, i = parseInt($(this).val()), i == 5e3 ? $(".pagination").hide() : $(".pagination").show(), f = $(n + " tbody tr").length, $(n + " tr:gt(0)").each(function () {
            r++;
            r > i && $(this).hide();
            r <= i && $(this).show()
         }), f > i)
         for (e = Math.ceil(f / i), u = 1; u <= e;) $(".pagination #prev").before('<li data-page="' + u + '"><span>' + u++ + '<span class="sr-only">(current)<\/span><\/span><\/li>').show();
      $('.pagination [data-page="1"]').addClass("active");
      $(".pagination li").on("click", function (i) {
         var r, u, f;
         if (i.stopImmediatePropagation(), i.preventDefault(), r = $(this).attr("data-page"), u = parseInt($("#maxRows").val()), r == "prev") {
            if (t == 1) return;
            r = --t
         }
         if (r == "next") {
            if (t == $(".pagination li").length - 2) return;
            r = ++t
         }
         t = r;
         f = 0;
         $(".pagination li").removeClass("active");
         $('.pagination [data-page="' + t + '"]').addClass("active");
         limitPagging();
         $(n + " tr:gt(0)").each(function () {
            f++;
            f > u * r || f <= u * r - u ? $(this).hide() : $(this).show()
         })
      });
      limitPagging()
   }).val(5).change()
}

function getPaginationPropType(n) {
   var t = 1;
   $("#PropertyTypeId").on("change", function () {
      var r, i, f, e, u;
      if (t = 1, $(".pagination").find("li").slice(1, -1).remove(), r = 0, i = parseInt($(this).val()), i == 5e3 ? $(".pagination").hide() : $(".pagination").show(), f = $(n + " tbody tr").length, $(n + " tr:gt(0)").each(function () {
            r++;
            r > i && $(this).hide();
            r <= i && $(this).show()
         }), f > i)
         for (e = Math.ceil(f / i), u = 1; u <= e;) $(".pagination #prev").before('<li data-page="' + u + '"><span>' + u++ + '<span class="sr-only">(current)<\/span><\/span><\/li>').show();
      $('.pagination [data-page="1"]').addClass("active");
      $(".pagination li").on("click", function (i) {
         var r, u, f;
         if (i.stopImmediatePropagation(), i.preventDefault(), r = $(this).attr("data-page"), u = parseInt($("#maxRows").val()), r == "prev") {
            if (t == 1) return;
            r = --t
         }
         if (r == "next") {
            if (t == $(".pagination li").length - 2) return;
            r = ++t
         }
         t = r;
         f = 0;
         $(".pagination li").removeClass("active");
         $('.pagination [data-page="' + t + '"]').addClass("active");
         limitPagging();
         $(n + " tr:gt(0)").each(function () {
            f++;
            f > u * r || f <= u * r - u ? $(this).hide() : $(this).show()
         })
      });
      limitPagging()
   }).val(10).change()
}

function getPaginationCategory(n) {
   var t = 1;
   $("#fpcategoryId").on("change", function () {
      var r, i, o, f, e, u;
      if (t = 1, $(".pagination").find("li").slice(1, -1).remove(), r = 0, i = parseInt($("#maxRows").val()), i == 5e3 ? $(".pagination").hide() : $(".pagination").show(), o = $(this).val(), f = $(n + " tbody tr").length, $(n + " tr:gt(0)").each(function () {
            r++;
            r > i && $(this).hide();
            r <= i && $(this).show()
         }), f > i)
         for (e = Math.ceil(f / i), u = 1; u <= e;) $(".pagination #prev").before('<li data-page="' + u + '"><span>' + u++ + '<span class="sr-only">(current)<\/span><\/span><\/li>').show();
      $('.pagination [data-page="1"]').addClass("active");
      $(".pagination li").on("click", function (i) {
         var r, u, f;
         if (i.stopImmediatePropagation(), i.preventDefault(), r = $(this).attr("data-page"), u = parseInt($("#maxRows").val()), r == "prev") {
            if (t == 1) return;
            r = --t
         }
         if (r == "next") {
            if (t == $(".pagination li").length - 2) return;
            r = ++t
         }
         t = r;
         f = 0;
         $(".pagination li").removeClass("active");
         $('.pagination [data-page="' + t + '"]').addClass("active");
         limitPagging();
         $(n + " tr:gt(0)").each(function () {
            f++;
            f > u * r || f <= u * r - u ? $(this).hide() : $(this).show()
         })
      });
      limitPagging()
   }).val(5).change()
}

function fnPriceCurrency() {
   var i = $("#hdnPrice").val().trim(),
      r = $("#hdnCurrencyCode").val().trim(),
      n = $("#hdnCurrencyValue").val().trim(),
      t;
   $("#ddlcountryprice").html("");
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetPriceCurrency",
      data: '{"strStartingPriceValue": "' + i + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (u) {
         var f = u.d;
         n != "0" && n != "" && n != "1" && (t = "<option selected='selected' value='" + n + "'>" + r + "<\/option>");
         t += "<option value='0'>AED<\/option>";
         $(f).each(function () {
            r != this.CurrencyCode && (t += "<option value='" + this.AEDConversionRate + "'>" + this.CurrencyCode + "<\/option>")
         });
         $("#ddlcountryprice").append(t);
         i == 0 ? ($("#ddlcountryprice").removeClass("dropdown"), $("#ddlcountryprice").addClass("dropdown d-none")) : ($("#ddlcountryprice").removeClass("dropdown d-none"), $("#ddlcountryprice").addClass("dropdown"))
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnddlSelectPrice() {
   var t = $("#hdnPrice").val().trim(),
      i = $("#hdnPriceText").val().trim(),
      n = $("#ddlcountryprice option:selected").text().trim(),
      r = $("#ddlcountryprice").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/getPriceConversionCurrency",
      data: '{"strStartingPriceValue": "' + t + '","strCurrencyCode": "' + n + '","strAEDConversionRate": "' + r + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (r) {
         if (t === "0") $("#lblPriceId").text("Call Us");
         else if (n.toLocaleUpperCase() == "AED") $("#lblPriceId").text(i), $("#myRange1").val(parseInt(t)), $("#cal1").text(parseInt(t)), $("#calcurr").text(n), $(".currconvert").text("AED");
         else {
            $("#lblPriceId").text("");
            var u = r.d;
            $("#lblPriceId").text(u[0].strPrice);
            $("#myRange1").val(parseInt(u[0].strPriceValue));
            $("#cal1").text(parseInt(u[0].strPriceValue));
            $("#calcurr").text(n);
            $(".currconvert").text(n)
         }
         fnsetpriceconvert()
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnbindddlSelectPrice() {
   var t = $("#hdnPrice").val().trim(),
      i = $("#hdnPriceText").val().trim(),
      n = $("#hdnCurrencyCode").val().trim(),
      r = $("#hdnCurrencyValue").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/getPriceConversionCurrency",
      data: '{"strStartingPriceValue": "' + t + '","strCurrencyCode": "' + n + '","strAEDConversionRate": "' + r + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (r) {
         if (t === "0") $("#lblPriceId").text("Call Us");
         else if (n.toLocaleUpperCase() == "AED") $("#lblPriceId").text(i), $("#myRange1").val(parseInt(t)), $("#cal1").text(parseInt(t)), $("#calcurr").text(n), $(".currconvert").text("AED");
         else {
            $("#lblPriceId").text("");
            var u = r.d;
            $("#lblPriceId").text(u[0].strPrice);
            $("#myRange1").val(parseInt(u[0].strPriceValue));
            $("#cal1").text(parseInt(u[0].strPriceValue));
            $("#calcurr").text(n);
            $(".currconvert").text(n)
         }
      },
      complete: function () {},
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnbindcalstaticvalue() {
   var r = $("#hdnPrice").val().trim(),
      u = $("#hdnPriceText").val().trim(),
      n = $("#hdnCurrencyCode").val().trim(),
      i = $("#hdnCurrencyValue").val().trim(),
      t;
   n.toUpperCase() != "AED" && n != "0" && n != null && (t = parseInt(i * 4e3), $("#spRegFeeId").text(t.toLocaleString()), $("#hdnRegFeeId").text(t), valuation = parseInt(i * 3e3), $("#spvaluationId").text(valuation.toLocaleString()), $("#hdnvaluationId").text(valuation), $(".currconvert").text(n))
}

function fnbindcalEMIvalue() {
   var t = $("#hdnPrice").val().trim(),
      i = $("#hdnPriceText").val().trim(),
      n = $("#hdnCurrencyCode").val().trim(),
      r = $("#hdnCurrencyValue").val().trim();
   n.toUpperCase() != "AED" && n != "0" && n != null && $(".emicurrconvert").text(n)
}

function fnddlSelectPrice2() {
   var t = $("#hdnPrice").val().trim(),
      i = $("#hdnPriceText").val().trim(),
      n = $("#ddlcountryprice option:selected").text().trim(),
      r = $("#ddlcountryprice").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/getPriceConversionCurrency",
      data: '{"strStartingPriceValue": "' + t + '","strCurrencyCode": "' + n + '","strAEDConversionRate": "' + r + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (r) {
         var ht;
         t === "0" ? $("#lblPriceId").text("Call Us") : n.toLocaleUpperCase() == "AED" ? ($("#lblPriceId").text(i), $("#myRange1").val(parseInt(t)), $("#cal1").text(parseInt(t)), $("#calcurr").text(n), $(".currconvert").text("AED")) : ($("#lblPriceId").text(""), ht = r.d, $("#lblPriceId").text(ht[0].strPrice), $("#myRange1").val(parseInt(ht[0].strPriceValue)), $("#cal1").text(parseInt(ht[0].strPriceValue)), $("#calcurr").text(n), $(".currconvert").text(n));
         var u = document.getElementById("myRange1"),
            kt = document.getElementById("cal1"),
            b = document.getElementById("myRange2"),
            dt = document.getElementById("cal2"),
            ct = document.getElementById("myRange3"),
            gt = document.getElementById("cal3"),
            lt = document.getElementById("myRange4"),
            ni = document.getElementById("cal4"),
            bt = document.getElementById("dpcalc"),
            a = document.getElementById("myRange2"),
            nt = document.getElementById("emiId"),
            h = $("#hdnCurrencyValue").val(),
            k = "",
            s = "",
            e = "",
            f = "",
            c = "",
            o = "",
            l = "",
            d = "",
            g = "",
            tt = "",
            p = "",
            it = "",
            v = "",
            rt = "",
            w = "",
            y = "0",
            at = "0",
            vt = "0",
            et = "",
            ut = "",
            ti = "0";
         kt.innerHTML = u.value;
         bt.innerHTML = (u.value / 100 * a.value).toLocaleString();
         dpId.innerHTML = (u.value / 100 * a.value).toLocaleString();
         et = u.value / 100 * a.value;
         o = u.value - u.value / 100 * a.value;
         hdnHomePrice.value = u.value;
         l = parseInt(o);
         PrincipalId.innerHTML = l.toLocaleString();
         Principal2Id.innerHTML = l.toLocaleString();
         loanamtId.innerHTML = l.toLocaleString();
         d = parseInt(u.value * .02 * h);
         hdnbrcommissionId.value = d;
         brcommissionId.innerHTML = d.toLocaleString();
         g = parseInt(u.value * .04 * h) + 540 * h;
         hdndldfeeId.value = g;
         dldfeeId.innerHTML = g.toLocaleString();
         tt = (u.value - u.value / 100 * a.value) * .0025 * h + 10 * h;
         p = parseFloat(tt);
         hdnmortgageregId.value = p;
         mortgageregId.innerHTML = p.toLocaleString();
         v = o * .0075 * h;
         hdnmortgageprocessingId.value = v;
         it = parseFloat(v).toLocaleString();
         mortgageprocessingId.innerHTML = it;
         k = u.value - u.value / 100 * a.value;
         s = ct.value;
         e = lt.value;
         f = Math.pow(1 + s / 1200, e) * k * s / 1200 / (Math.pow(1 + s / 1200, e) - 1);
         c = parseInt(f);
         nt.innerHTML = (f * 1).toFixed(0).toLocaleString();
         nt.innerHTML = c.toLocaleString();
         monthlyPayId.innerHTML = c.toLocaleString();
         var ot = "0",
            st = "0",
            yt = "0",
            ft = "0",
            pt = "0",
            wt = "0";
         ot = hdnbrcommissionId.value;
         st = hdndldfeeId.value;
         yt = hdnmortgageregId.value;
         ft = hdnmortgageprocessingId.value;
         pt = hdnRegFeeId.value;
         wt = hdnvaluationId.value;
         w = parseFloat(ot) + parseFloat(st) + parseFloat(yt) + parseFloat(ft) + parseFloat(pt) + parseFloat(wt);
         rt = w.toLocaleString();
         totalextraId.innerHTML = rt;
         ut = w + et;
         requiredupfrontId.innerHTML = ut.toLocaleString();
         y = (f * e - o).toFixed(2);
         at = (y * 100 / (f * e)).toFixed(2);
         vt = (o * 100 / (f * e)).toFixed(2);
         ti = (o / (f * e)).toFixed(2);
         interestpayableId.innerHTML = parseFloat(y).toLocaleString();
         interestId.innerHTML = parseFloat(y).toLocaleString();
         totalpayableId.innerHTML = parseInt(f * e).toLocaleString();
         hdnEMI.value = f.toFixed(2);
         hdnMortgageamount.value = o;
         hdnTotalMonths.value = e;
         hdnROI.value = s;
         u.oninput = function () {
            kt.innerHTML = this.value;
            bt.innerHTML = (u.value / 100 * a.value).toLocaleString();
            dpId.innerHTML = (u.value / 100 * a.value).toLocaleString();
            k = u.value - u.value / 100 * a.value;
            f = Math.pow(1 + s / 1200, e) * k * s / 1200 / (Math.pow(1 + s / 1200, e) - 1);
            c = parseInt(f);
            nt.innerHTML = c.toLocaleString();
            hdnHomePrice.value = u.value;
            o = u.value - u.value / 100 * a.value;
            y = (f * e - o).toFixed(2);
            at = (y * 100 / (f * e)).toFixed(2);
            vt = (o * 100 / (f * e)).toFixed(2);
            interestpayableId.innerHTML = parseFloat(y).toLocaleString();
            monthlyPayId.innerHTML = c.toLocaleString();
            totalpayableId.innerHTML = parseInt(f * e).toLocaleString();
            l = parseInt(o);
            PrincipalId.innerHTML = l.toLocaleString();
            Principal2Id.innerHTML = l.toLocaleString();
            loanamtId.innerHTML = l.toLocaleString();
            d = u.value * .02 * h;
            ot = d;
            hdnbrcommissionId.value = d;
            brcommissionId.innerHTML = d.toLocaleString();
            g = parseInt(u.value * .04 * h) + 540 * h;
            hdndldfeeId = g;
            st = g;
            dldfeeId.innerHTML = g.toLocaleString();
            tt = (u.value - u.value / 100 * a.value) * .0025 * h + 10 * h;
            p = parseFloat(tt);
            hdnmortgageregId.value = p;
            mortgageregId.value = p.toLocaleString();
            v = o * .0075 * h;
            hdnmortgageprocessingId.value = v;
            ft = v;
            it = parseFloat(v).toLocaleString();
            mortgageprocessingId.innerHTML = it;
            w = parseFloat(ot) + parseFloat(st) + parseFloat(yt) + parseFloat(ft) + parseFloat(pt) + parseFloat(wt);
            rt = w.toLocaleString();
            totalextraId.innerHTML = rt;
            ut = w + et;
            requiredupfrontId.innerHTML = ut.toLocaleString();
            hdnEMI.value = f;
            hdnMortgageamount.value = o;
            fnEMIMonthly()
         };
         dt.innerHTML = (b.value * 1).toFixed(0);
         b.oninput = function () {
            dt.innerHTML = (this.value * 1).toFixed(0);
            bt.innerHTML = (u.value / 100 * b.value).toLocaleString();
            et = u.value / 100 * b.value;
            dpId.innerHTML = (u.value / 100 * b.value).toLocaleString();
            k = u.value - u.value / 100 * b.value;
            f = Math.pow(1 + s / 1200, e) * k * s / 1200 / (Math.pow(1 + s / 1200, e) - 1);
            c = parseInt(f);
            nt.innerHTML = c.toLocaleString();
            monthlyPayId.innerHTML = c.toLocaleString();
            o = u.value - u.value / 100 * b.value;
            l = parseInt(o);
            PrincipalId.innerHTML = l.toLocaleString();
            Principal2Id.innerHTML = l.toLocaleString();
            loanamtId.innerHTML = l.toLocaleString();
            totalpayableId.innerHTML = parseInt(f * e).toLocaleString();
            tt = (u.value - u.value / 100 * b.value) * .0025 * h + 10 * h;
            p = parseFloat(tt);
            hdnmortgageregId.value = p;
            mortgageregId.value = p.toLocaleString();
            v = o * .0075 * h;
            hdnmortgageprocessingId.value = v;
            ft = v;
            it = parseFloat(v).toLocaleString();
            mortgageprocessingId.innerHTML = it;
            w = parseFloat(ot) + parseFloat(st) + parseFloat(yt) + parseFloat(ft) + parseFloat(pt) + parseFloat(wt);
            rt = w.toLocaleString();
            totalextraId.innerHTML = rt;
            ut = w + et;
            requiredupfrontId.innerHTML = ut.toLocaleString();
            hdnEMI.value = f;
            hdnMortgageamount.value = o;
            fnEMIMonthly()
         };
         gt.innerHTML = (ct.value * 1).toFixed(2);
         ct.oninput = function () {
            gt.innerHTML = (this.value * 1).toFixed(2);
            s = ct.value;
            f = Math.pow(1 + s / 1200, e) * k * s / 1200 / (Math.pow(1 + s / 1200, e) - 1);
            c = parseInt(f);
            nt.innerHTML = c.toLocaleString();
            y = (f * e - o).toFixed(2);
            at = (y * 100 / (f * e)).toFixed(2);
            vt = (o * 100 / (f * e)).toFixed(2);
            totalpayableId.innerHTML = parseInt(f * e).toLocaleString();
            initChart();
            monthlyPayId.innerHTML = c.toLocaleString();
            hdnEMI.value = f;
            hdnMortgageamount.value = o;
            hdnROI.value = s;
            fnEMIMonthly()
         };
         ni.innerHTML = lt.value;
         lt.oninput = function () {
            ni.innerHTML = this.value;
            e = lt.value;
            f = Math.pow(1 + s / 1200, e) * k * s / 1200 / (Math.pow(1 + s / 1200, e) - 1);
            c = parseInt(f);
            nt.innerHTML = c.toLocaleString();
            y = (f * e - o).toFixed(2);
            at = (y * 100 / (f * e)).toFixed(2);
            vt = (o * 100 / (f * e)).toFixed(2);
            totalpayableId.innerHTML = parseInt(f * e).toLocaleString();
            initChart();
            monthlyPayId.innerHTML = c.toLocaleString();
            hdnEMI.value = f;
            hdnMortgageamount.value = o;
            hdnTotalMonths.value = e;
            fnEMIMonthly()
         }
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fngetselectedfp() {
   var n = $("#hdnProjName").val().trim(),
      t = $("#PropertyTypeId option:selected").text().trim(),
      i = $("#fpcategoryId option:selected").text().trim(),
      r = $("#fpsubcategoryId option:selected").text().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/Createfloorplancookies",
      data: '{"strproptype": "' + t + '","strcategory": "' + i + '","strsubcategory": "' + r + '","strProjName": "' + n + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function () {},
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnPropertyTypedl() {
   var t = $("#hdnProjId").val().trim(),
      n;
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetPropertyTypedl",
      data: '{"strProjId": "' + t + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (t) {
         $("#PropertyTypedlId").html("");
         var r = t.d,
            i = r[0].strPropertyTypecookies;
         n = "<option value='0'>All<\/option>";
         $(r).each(function () {
            n += i != "" && i != null && i != "undefined" && i.toUpperCase() != "ALL" ? "<option selected='selected' value='" + this.strPropertyType + "'>" + this.strPropertyType + "<\/option>" : "<option value='" + this.strPropertyType + "'>" + this.strPropertyType + "<\/option>"
         });
         $("#PropertyTypedlId").append(n)
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnfpcategorydl() {
   var t = $("#hdnProjId").val().trim(),
      n;
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpCategorydl",
      data: '{"strProjId": "' + t + '","strPropertyType": "" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (t) {
         $("#fpcategorydlId").html("");
         var r = t.d,
            i = r[0].strCategorycookies;
         n = "<option value='0' selected='selected'>All<\/option>";
         $(r).each(function () {
            n += i != "" && i != null && i != "undefined" && i.toUpperCase() != "ALL" ? i === this.strCategory ? "<option selected='selected' value='" + this.strCategory + "'>" + this.strCategory + "<\/option>" : "<option value='" + this.strCategory + "'>" + this.strCategory + "<\/option>" : "<option value='" + this.strCategory + "'>" + this.strCategory + "<\/option>"
         });
         $("#fpcategorydlId").append(n)
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnfpSubcategorydl() {
   var t = $("#hdnProjId").val().trim(),
      n;
   $.ajax({
      type: "POST",
      url: "/Projects/projectgetdata.aspx/GetfpSubCategorydl",
      data: '{"strProjId": "' + t + '","strPropertyType": "","strCategory": "" }',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (t) {
         $("#fpsubcategorydlId").html("");
         var r = t.d,
            i = r[0].strSubCategorycookies;
         n = "<option value='0' selected='selected'>All<\/option>";
         $(r).each(function () {
            n += i != "" && i != null && i != "undefined" && i.toUpperCase() != "ALL" ? i === this.strSubCategory ? "<option selected='selected' value='" + this.strSubCategory + "'>" + this.strSubCategory + "<\/option>" : "<option value='" + this.strSubCategory + "'>" + this.strSubCategory + "<\/option>" : "<option value='" + this.strSubCategory + "'>" + this.strSubCategory + "<\/option>"
         });
         $("#fpsubcategorydlId").append(n)
      },
      failure: function (n) {
         alert(n.d)
      },
      error: function (n) {
         alert(n.d)
      }
   })
}

function fnsetpriceconvert2() {
   var i = "",
      r = "",
      e = $("#ddlcountryprice option:selected").text().trim(),
      t, u, n;
   if (e === "" ? (i = $("#hdnCurrencyCode").val().trim(), r = $("#hdnCurrencyValue").val().trim()) : (i = $("#ddlcountryprice option:selected").text().trim(), r = $("#ddlcountryprice").val().trim()), t = $("#moreprojectsId").find(".tempprice"), u = $(t).length, parseInt(u) > 0)
      for (n = 0; n < u; n++) {
         var o = $(t[n]).find(".tempmoreprojectscss"),
            s = $(t[n]).find(".hdntempmoreprojectscss"),
            f = "";
         f = $(s).val();
         f != "0" && $.ajax({
            type: "POST",
            async: !1,
            url: "/Projects/projectgetdata.aspx/getPriceConversionCurrency",
            data: '{"strStartingPriceValue": "' + f + '","strCurrencyCode": "' + i + '","strAEDConversionRate": "' + r + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (n) {
               var t = n.d;
               $(o).text(t[0].strPrice)
            },
            failure: function (n) {
               alert(n.d)
            },
            error: function (n) {
               alert(n.d)
            }
         })
      }
}

function fnsetpriceconvert() {
   var n = "",
      r = "",
      s = $("#ddlcountryprice option:selected").text().trim(),
      i, u, t, e, o;
   if (s === "" ? (n = $("#hdnCurrencyCode").val().trim(), r = $("#hdnCurrencyValue").val().trim()) : (n = $("#ddlcountryprice option:selected").text().trim(), r = $("#ddlcountryprice").val().trim()), i = $("#moreprojectsId").find(".tempprice"), u = $(i).length, parseInt(u) > 0)
      for (t = 0; t < u; t++) {
         var h = $(i[t]).find(".tempmoreprojectscss"),
            c = $(i[t]).find(".hdntempmoreprojectscss"),
            f = "";
         f = $(c).val();
         n != "0" && n.toLowerCase() != "aed" && f != "0" && (e = "", o = "", e = f * r, o = e.toLocaleString(), $(h).text(n + " " + o))
      }
}

function IsEmail(n) {
   return /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(n) ? !0 : !1
}

function saveprojqc() {
   var d = window.location.origin.toString() + "/Projects/GetBrochure.aspx/SaveBrochureData",
      t = "",
      p = $("#txtname").val(),
      h = $("#txtemail").val(),
      c = $("#ddlCountryCode").val(),
      l = $("#txtphone").val(),
      g = $("#txtmsg").val(),
      nt = $("#hdnProjName").val(),
      tt = window.location.toString(),
      w = "",
      b = "",
      k = "",
      i = "https://manage.tanamiproperties.com/Project/",
      a = $("#hdnBrchPathId").val(),
      v = $("#hdnBrchfpPathId").val(),
      y = $("#hdnBrchppPathId").val(),
      u, r, f, e, o, s, n;
   return w = a.toLowerCase() === "default.pdf" ? i + "Brochure/" + a : i + "Brochure/" + a, b = v.toLowerCase() === "default.pdf" ? i + "FloorPlanBrochure/" + v : i + "FloorPlanBrochure/" + v, k = y.toLowerCase() === "default.pdf" ? i + "PaymentPlanBrochure/" + y : i + "PaymentPlanBrochure/" + y, u = Cookies.get("strAdsource"), (u == null || u == "") && (u = "NA"), r = Cookies.get("landed"), (r == null || r == "" || r == "0") && (r = "0"), f = Cookies.get("strAdGroup"), (f == null || f == "") && (f = "NA"), e = Cookies.get("strKeywords"), (e == null || e == "") && (e = "NA"), o = Cookies.get("strMatchType"), (o == null || o == "") && (o = "NA"), s = Cookies.get("strDeviceName"), (s == null || s == "") && (s = "NA"), p.length === 0 && (t = "-Name is required"), h.length === 0 ? t += "\n-Email is required." : IsEmail(h) === !1 && (t += "\n-Invalid Email Id.\n"), c.length === 0 ? t += "\n-Please Select Country Code." : c.toString().toLowerCase() === "code" && (t += "\n-Please Select Country Code."), l.length === 0 ? t += "\n-Phone No is required." : l.length < 6 && (t += "\nInvalid Phone No"), t.length > 0 ? alert(t) : ($("#lfpqc").css("display", "block"), n = {}, n.name = p, n.email = h, n.cid = c, n.mob = l, n.message = g, n.source = tt, n.pid = 0, n.type = "pqc", n.adsource = u, n.adgroup = f, n.keywords = e, n.matchtype = o, n.devicename = s, n.landed = r, n.ProjName = nt, $.ajax({
      type: "POST",
      url: d,
      data: JSON.stringify(n),
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (n) {
         n.d.length > 0 && (msg = n.d, $("#lblmsg").html(msg))
      },
      complete: function () {
         $("#lfpqc").css("display", "none");
         $("#txtname").val("");
         $("#txtemail").val("");
         $("#ddlCountryCode").val("Code");
         $("#txtphone").val("");
         $("#txtmsg").val("");
         $("#trackBrochure1").attr("href", w);
         $("#trackBrochure2").attr("href", k);
         $("#trackBrochure3").attr("href", b)
      }
   })), !0
}

function saveprojqc2() {
   var p = window.location.origin.toString() + "/Projects/GetBrochure.aspx/SaveBrochureData",
      t = "",
      a = $("#txtname").val(),
      s = $("#txtemail").val(),
      h = $("#ddlCountryCode").val(),
      c = $("#txtphone").val(),
      w = $("#txtmsg").val(),
      b = $("#hdnProjName").val(),
      k = window.location.toString(),
      v = "",
      y = "https://manage.tanamiproperties.com/Project/",
      l = $("#hdnBrchPathId").val(),
      r, i, u, f, e, o, n;
   return v = l.toLowerCase() === "default.pdf" ? y + "Brochure/" + l : y + "Brochure/" + l, r = Cookies.get("strAdsource"), (r == null || r == "") && (r = "NA"), i = Cookies.get("landed"), (i == null || i == "" || i == "0") && (i = "0"), u = Cookies.get("strAdGroup"), (u == null || u == "") && (u = "NA"), f = Cookies.get("strKeywords"), (f == null || f == "") && (f = "NA"), e = Cookies.get("strMatchType"), (e == null || e == "") && (e = "NA"), o = Cookies.get("strDeviceName"), (o == null || o == "") && (o = "NA"), a.length === 0 && (t = "-Name is required"), s.length === 0 ? t += "\n-Email is required." : IsEmail(s) === !1 && (t += "\n-Invalid Email Id.\n"), h.length === 0 ? t += "\n-Please Select Country Code." : h.toString().toLowerCase() === "code" && (t += "\n-Please Select Country Code."), c.length === 0 ? t += "\n-Phone No is required." : c.length < 6 && (t += "\nInvalid Phone No"), t.length > 0 ? alert(t) : ($("#lfpqc").css("display", "block"), n = {}, n.name = a, n.email = s, n.cid = h, n.mob = c, n.message = w, n.source = k, n.pid = 0, n.type = "pqc", n.adsource = r, n.adgroup = u, n.keywords = f, n.matchtype = e, n.devicename = o, n.landed = i, n.ProjName = b, $.ajax({
      type: "POST",
      url: p,
      data: JSON.stringify(n),
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (n) {
         n.d.length > 0 && (msg = n.d, $("#lblmsg").html(msg))
      },
      complete: function () {
         $("#lfpqc").css("display", "none");
         $("#txtname").val("");
         $("#txtemail").val("");
         $("#ddlCountryCode").val("Code");
         $("#txtphone").val("");
         $("#txtmsg").val("");
         $("#trackBrochure1").attr("href", v)
      }
   })), !0
}

function fnSetAEProjectURL() {
   var n = $("#hdnProjNameAR").val().trim(),
      t = $("#hdnPageName").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/GetBrochure.aspx/SetArabicURL",
      data: '{"strProjNameAR": "' + n + '", "strPageName": "' + t + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (n) {
         n.d.length > 0 && (window.location.href = n.d)
      },
      failure: function () {
         window.location.href = "https://tanamiproperties.com/"
      },
      error: function () {
         window.location.href = "https://tanamiproperties.com/"
      }
   })
}

function fnSetAEProjectURL2() {
   var n = $("#hdnProjNameAR").val().trim(),
      t = $("#hdnPageName").val().trim();
   $.ajax({
      type: "POST",
      url: "/Projects/GetBrochure.aspx/SetArabicURL",
      data: '{"strProjNameAR": "' + n + '", "strPageName": "' + t + '"}',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (n) {
         n.d.length > 0 && (window.location.href = n.d)
      },
      failure: function () {
         window.location.href = "https://tanamiproperties.com/"
      },
      error: function () {
         window.location.href = "https://tanamiproperties.com/"
      }
   })
}

function fnnameqcBit() {
   var n = $("#txtNameBit").val().trim();
   n.length === 0 ? ($("#spNameBit").removeClass("text-danger d-none"), $("#spNameBit").addClass("text-danger d-block"), $("#spNameBit").text("Name is required")) : ($("#spNameBit").removeClass("text-danger d-block"), $("#spNameBit").addClass("text-danger d-none"), $("#spNameBit").text(""))
}

function fnemailqcBit() {
   var n = $("#txtEmailBit").val().trim(),
      t;
   n.length === 0 ? ($("#spEmailBit").removeClass("text-danger d-none"), $("#spEmailBit").addClass("text-danger d-block"), $("#spEmailBit").text("Email is required")) : (t = IsEmail(n), t === !1 ? ($("#spEmailBit").removeClass("text-danger d-none"), $("#spEmailBit").addClass("text-danger d-block"), $("#spEmailBit").text("Invalid Email id.")) : ($("#spEmailBit").removeClass("text-danger d-block"), $("#spEmailBit").addClass("text-danger d-none"), $("#spEmailBit").text("")))
}

function fnphoneqcBit() {
   var n = $("#txtContactNoBit").val().trim();
   n.length === 0 ? ($("#spContactnoBit").removeClass("text-danger d-none"), $("#spContactnoBit").addClass("text-danger d-block"), $("#spContactnoBit").text("Phone No is required.")) : n.length < 7 ? ($("#spContactnoBit").removeClass("text-danger d-none"), $("#spContactnoBit").addClass("text-danger d-block"), $("#spContactnoBit").text("Invalid Phone No.")) : ($("#spContactnoBit").removeClass("text-danger d-block"), $("#spContactnoBit").addClass("text-danger d-none"), $("#spContactnoBit").text(""))
}

function saveprojqcBit() {
   var i, r = "",
      n;
   $("#loaderprojBit").html("");
   i = "<img src='/images/icon/loading.gif' alt='Sending'/>";
   i += "<span>Sending...<\/span>";
   $("#loaderprojBit").append(i);
   i += "<span>Message Sent Successfully.<\/span>";
   var o = window.location.origin.toString() + "/Projects/GetBrochure.aspx/SaveBrochureData",
      t = "",
      e = $("#txtNameBit").val(),
      u = $("#txtEmailBit").val(),
      s = $("#ddlCountryCodeBit").val(),
      f = $("#txtContactNoBit").val();
   r = $("#txtMessageBit").val() + " <br/> Interested in Bitcoin CryptoCurrency Investment";
   var h = window.location.toString(),
      c = $("#hdnProjName").val();
   return (e.length === 0 && (t = "1", $("#spNameBit").removeClass("text-danger d-none"), $("#spNameBit").addClass("text-danger d-block"), $("#spNameBit").text("Name is required")), u.length === 0 ? (t = "1", $("#spEmailBit").removeClass("text-danger d-none"), $("#spEmailBit").addClass("text-danger d-block"), $("#spEmailBit").text("Email is required")) : IsEmail(u) === !1 && (t = "1", $("#spEmailBit").removeClass("text-danger d-none"), $("#spEmailBit").addClass("text-danger d-block"), $("#spEmailBit").text("Invalid Email Id")), f.length === 0 ? (t = "1", $("#spContactnoBit").removeClass("text-danger d-none"), $("#spContactnoBit").addClass("text-danger d-block"), $("#spContactnoBit").text("Phone No is required")) : f.length < 6 && (t = "1", $("#spContactnoBit").removeClass("text-danger d-none"), $("#spContactnoBit").addClass("text-danger d-block"), $("#spContactnoBit").text("Invalid Phone No")), t.length > 0) ? !1 : ($("#loaderbit").css("display", "block"), n = {}, n.name = e, n.email = u, n.cid = s, n.mob = f, n.message = r, n.source = h, n.pid = 0, n.type = "pqc", n.adsource = "NA", n.adgroup = "NA", n.keywords = "NA", n.matchtype = "NA", n.devicename = "NA", n.landed = "0", n.ProjName = c, $.ajax({
      type: "POST",
      url: o,
      data: JSON.stringify(n),
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success: function (n) {
         n.d.length > 0 && (r = n.d)
      },
      complete: function () {
         $("#loaderbit").css("display", "none");
         $("#txtNameBit").val("");
         $("#txtEmailBit").val("");
         $("#ddlCountryCodeBit").val("119");
         $("#txtContactNoBit").val("");
         $("#txtMessageBit").val("");
         $("#spNameBit").removeClass("text-danger d-block");
         $("#spNameBit").addClass("text-danger d-none");
         $("#spEmailBit").removeClass("text-danger d-block");
         $("#spEmailBit").addClass("text-danger d-none");
         $("#spContactnoBit").removeClass("text-danger d-block");
         $("#spContactnoBit").addClass("text-danger d-none");
         window.location.href = "https://www.tanamiproperties.com/bitcoin-investments-dubai.aspx"
      }
   }), !0)
}

function fnbitclose() {
   $("#spNameBit").text("");
   $("#spEmailBit").text("");
   $("#spContactnoBit").text("");
   $("#txtNameBit").val("");
   $("#txtEmailBit").val("");
   $("#ddlCountryCodeBit").val("119");
   $("#txtContactNoBit").val("");
   $("#txtMessageBit").val("Hi, I want to explore an investment opportunity with Cryptocurrency in " + $("#hdnProjName").val() + ".")
}(function (n, t) {
   "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : n.Popper = t()
})(this, function () {
   "use strict";

   function ut(n) {
      return n && "[object Function]" === {}.toString.call(n)
   }

   function e(n, t) {
      if (1 !== n.nodeType) return [];
      var i = window.getComputedStyle(n, null);
      return t ? i[t] : i
   }

   function y(n) {
      return "HTML" === n.nodeName ? n : n.parentNode || n.host
   }

   function o(n) {
      if (!n || -1 !== ["HTML", "BODY", "#document"].indexOf(n.nodeName)) return window.document.body;
      var t = e(n),
         i = t.overflow,
         r = t.overflowX,
         u = t.overflowY;
      return /(auto|scroll)/.test(i + u + r) ? n : o(y(n))
   }

   function r(n) {
      var t = n && n.offsetParent,
         i = t && t.nodeName;
      return i && "BODY" !== i && "HTML" !== i ? -1 !== ["TD", "TABLE"].indexOf(t.nodeName) && "static" === e(t, "position") ? r(t) : t : window.document.documentElement
   }

   function ri(n) {
      var t = n.nodeName;
      return "BODY" !== t && ("HTML" === t || r(n.firstElementChild) === n)
   }

   function p(n) {
      return null === n.parentNode ? n : p(n.parentNode)
   }

   function h(n, t) {
      var i, f;
      if (!n || !n.nodeType || !t || !t.nodeType) return window.document.documentElement;
      var e = n.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
         o = e ? n : t,
         s = e ? t : n,
         u = document.createRange();
      return (u.setStart(o, 0), u.setEnd(s, 0), i = u.commonAncestorContainer, n !== i && t !== i || o.contains(s)) ? ri(i) ? i : r(i) : (f = p(n), f.host ? h(f.host, t) : h(n, p(t).host))
   }

   function u(n) {
      var f = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top",
         t = "top" === f ? "scrollTop" : "scrollLeft",
         i = n.nodeName,
         r, u;
      return "BODY" === i || "HTML" === i ? (r = window.document.documentElement, u = window.document.scrollingElement || r, u[t]) : n[t]
   }

   function ui(n, t) {
      var e = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
         r = u(t, "top"),
         f = u(t, "left"),
         i = e ? -1 : 1;
      return n.top += r * i, n.bottom += r * i, n.left += f * i, n.right += f * i, n
   }

   function ft(n, t) {
      var i = "x" === t ? "Left" : "Top",
         r = "Left" == i ? "Right" : "Bottom";
      return +n["border" + i + "Width"].split("px")[0] + +n["border" + r + "Width"].split("px")[0]
   }

   function et(n, t, r, u) {
      return i(t["offset" + n], r["client" + n], r["offset" + n], l() ? r["offset" + n] + u["margin" + ("Height" === n ? "Top" : "Left")] + u["margin" + ("Height" === n ? "Bottom" : "Right")] : 0)
   }

   function ot() {
      var t = window.document.body,
         n = window.document.documentElement,
         i = l() && window.getComputedStyle(n);
      return {
         height: et("Height", t, n, i),
         width: et("Width", t, n, i)
      }
   }

   function t(t) {
      return n({}, t, {
         right: t.left + t.width,
         bottom: t.top + t.height
      })
   }

   function w(n) {
      var i = {},
         f, o, c;
      if (l()) try {
         i = n.getBoundingClientRect();
         f = u(n, "top");
         o = u(n, "left");
         i.top += f;
         i.left += o;
         i.bottom += f;
         i.right += o
      } catch (n) {} else i = n.getBoundingClientRect();
      var r = {
            left: i.left,
            top: i.top,
            width: i.right - i.left,
            height: i.bottom - i.top
         },
         a = "HTML" === n.nodeName ? ot() : {},
         v = a.width || n.clientWidth || r.right - r.left,
         y = a.height || n.clientHeight || r.bottom - r.top,
         s = n.offsetWidth - v,
         h = n.offsetHeight - y;
      return (s || h) && (c = e(n), s -= ft(c, "x"), h -= ft(c, "y"), r.width -= s, r.height -= h), t(r)
   }

   function b(n, i) {
      var y = l(),
         b = "HTML" === i.nodeName,
         u = w(n),
         p = w(i),
         c = o(n),
         f = e(i),
         a = +f.borderTopWidth.split("px")[0],
         v = +f.borderLeftWidth.split("px")[0],
         r = t({
            top: u.top - p.top - a,
            left: u.left - p.left - v,
            width: u.width,
            height: u.height
         }),
         s, h;
      return (r.marginTop = 0, r.marginLeft = 0, !y && b) && (s = +f.marginTop.split("px")[0], h = +f.marginLeft.split("px")[0], r.top -= a - s, r.bottom -= a - s, r.left -= v - h, r.right -= v - h, r.marginTop = s, r.marginLeft = h), (y ? i.contains(c) : i === c && "BODY" !== c.nodeName) && (r = ui(r, i)), r
   }

   function fi(n) {
      var r = window.document.documentElement,
         f = b(n, r),
         e = i(r.clientWidth, window.innerWidth || 0),
         o = i(r.clientHeight, window.innerHeight || 0),
         s = u(r),
         h = u(r, "left"),
         c = {
            top: s - f.top + f.marginTop,
            left: h - f.left + f.marginLeft,
            width: e,
            height: o
         };
      return t(c)
   }

   function st(n) {
      var t = n.nodeName;
      return "BODY" === t || "HTML" === t ? !1 : "fixed" === e(n, "position") || st(y(n))
   }

   function k(n, t, i, r) {
      var u = {
            top: 0,
            left: 0
         },
         s = h(n, t),
         e, f;
      if ("viewport" === r) u = fi(s);
      else if ("scrollParent" === r ? (e = o(y(n)), "BODY" === e.nodeName && (e = window.document.documentElement)) : e = "window" === r ? window.document.documentElement : r, f = b(e, s), "HTML" !== e.nodeName || st(s)) u = f;
      else {
         var c = ot(),
            l = c.height,
            a = c.width;
         u.top += f.top - f.marginTop;
         u.bottom = l + f.top;
         u.left += f.left - f.marginLeft;
         u.right = a + f.left
      }
      return u.left += i, u.top += i, u.right -= i, u.bottom -= i, u
   }

   function ei(n) {
      var t = n.width,
         i = n.height;
      return t * i
   }

   function ht(t, i, r, u, f) {
      var l = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
      if (-1 === t.indexOf("auto")) return t;
      var e = k(r, u, l, f),
         o = {
            top: {
               width: e.width,
               height: i.top - e.top
            },
            right: {
               width: e.right - i.right,
               height: e.height
            },
            bottom: {
               width: e.width,
               height: e.bottom - i.bottom
            },
            left: {
               width: i.left - e.left,
               height: e.height
            }
         },
         s = Object.keys(o).map(function (t) {
            return n({
               key: t
            }, o[t], {
               area: ei(o[t])
            })
         }).sort(function (n, t) {
            return t.area - n.area
         }),
         h = s.filter(function (n) {
            var t = n.width,
               i = n.height;
            return t >= r.clientWidth && i >= r.clientHeight
         }),
         a = 0 < h.length ? h[0].key : s[0].key,
         c = t.split("-")[1];
      return a + (c ? "-" + c : "")
   }

   function ct(n, t, i) {
      var r = h(t, i);
      return b(i, r)
   }

   function lt(n) {
      var t = window.getComputedStyle(n),
         i = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
         r = parseFloat(t.marginLeft) + parseFloat(t.marginRight);
      return {
         width: n.offsetWidth + r,
         height: n.offsetHeight + i
      }
   }

   function c(n) {
      var t = {
         left: "right",
         right: "left",
         bottom: "top",
         top: "bottom"
      };
      return n.replace(/left|right|bottom|top/g, function (n) {
         return t[n]
      })
   }

   function at(n, t, i) {
      i = i.split("-")[0];
      var r = lt(n),
         e = {
            width: r.width,
            height: r.height
         },
         u = -1 !== ["right", "left"].indexOf(i),
         o = u ? "top" : "left",
         f = u ? "left" : "top",
         s = u ? "height" : "width",
         h = u ? "width" : "height";
      return e[o] = t[o] + t[s] / 2 - r[s] / 2, e[f] = i === f ? t[f] - r[h] : t[c(f)], e
   }

   function s(n, t) {
      return Array.prototype.find ? n.find(t) : n.filter(t)[0]
   }

   function oi(n, t, i) {
      if (Array.prototype.findIndex) return n.findIndex(function (n) {
         return n[t] === i
      });
      var r = s(n, function (n) {
         return n[t] === i
      });
      return n.indexOf(r)
   }

   function vt(n, i, r) {
      var u = void 0 === r ? n : n.slice(0, oi(n, "name", r));
      return u.forEach(function (n) {
         n.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
         var r = n.function || n.fn;
         n.enabled && ut(r) && (i.offsets.popper = t(i.offsets.popper), i.offsets.reference = t(i.offsets.reference), i = r(i, n))
      }), i
   }

   function si() {
      if (!this.state.isDestroyed) {
         var n = {
            instance: this,
            styles: {},
            attributes: {},
            flipped: !1,
            offsets: {}
         };
         n.offsets.reference = ct(this.state, this.popper, this.reference);
         n.placement = ht(this.options.placement, n.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding);
         n.originalPlacement = n.placement;
         n.offsets.popper = at(this.popper, n.offsets.reference, n.placement);
         n.offsets.popper.position = "absolute";
         n = vt(this.modifiers, n);
         this.state.isCreated ? this.options.onUpdate(n) : (this.state.isCreated = !0, this.options.onCreate(n))
      }
   }

   function yt(n, t) {
      return n.some(function (n) {
         var i = n.name,
            r = n.enabled;
         return r && i === t
      })
   }

   function pt(n) {
      for (var i, r, u = [!1, "ms", "Webkit", "Moz", "O"], f = n.charAt(0).toUpperCase() + n.slice(1), t = 0; t < u.length - 1; t++)
         if (i = u[t], r = i ? "" + i + f : n, "undefined" != typeof window.document.body.style[r]) return r;
      return null
   }

   function hi() {
      return this.state.isDestroyed = !0, yt(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.left = "", this.popper.style.position = "", this.popper.style.top = "", this.popper.style[pt("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
   }

   function wt(n, t, i, r) {
      var f = "BODY" === n.nodeName,
         u = f ? window : n;
      u.addEventListener(t, i, {
         passive: !0
      });
      f || wt(o(u.parentNode), t, i, r);
      r.push(u)
   }

   function ci(n, t, i, r) {
      i.updateBound = r;
      window.addEventListener("resize", i.updateBound, {
         passive: !0
      });
      var u = o(n);
      return wt(u, "scroll", i.updateBound, i.scrollParents), i.scrollElement = u, i.eventsEnabled = !0, i
   }

   function li() {
      this.state.eventsEnabled || (this.state = ci(this.reference, this.options, this.state, this.scheduleUpdate))
   }

   function ai(n, t) {
      return window.removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function (n) {
         n.removeEventListener("scroll", t.updateBound)
      }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t
   }

   function vi() {
      this.state.eventsEnabled && (window.cancelAnimationFrame(this.scheduleUpdate), this.state = ai(this.reference, this.state))
   }

   function d(n) {
      return "" !== n && !isNaN(parseFloat(n)) && isFinite(n)
   }

   function g(n, t) {
      Object.keys(t).forEach(function (i) {
         var r = ""; - 1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(i) && d(t[i]) && (r = "px");
         n.style[i] = t[i] + r
      })
   }

   function yi(n, t) {
      Object.keys(t).forEach(function (i) {
         var r = t[i];
         !1 === r ? n.removeAttribute(i) : n.setAttribute(i, t[i])
      })
   }

   function bt(n, t, i) {
      var u = s(n, function (n) {
            var i = n.name;
            return i === t
         }),
         f = !!u && n.some(function (n) {
            return n.name === i && n.enabled && n.order < u.order
         }),
         r;
      return f || (r = "`" + t + "`", console.warn("`" + i + "` modifier is required by " + r + " modifier in order to work, be sure to include it before " + r + "!")), f
   }

   function pi(n) {
      return "end" === n ? "start" : "start" === n ? "end" : n
   }

   function kt(n) {
      var r = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
         t = it.indexOf(n),
         i = it.slice(t + 1).concat(it.slice(0, t));
      return r ? i.reverse() : i
   }

   function wi(n, r, u, f) {
      var h = n.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
         o = +h[1],
         e = h[2],
         s, c, l;
      if (!o) return n;
      if (0 === e.indexOf("%")) {
         switch (e) {
            case "%p":
               s = u;
               break;
            case "%":
            case "%r":
            default:
               s = f
         }
         return c = t(s), c[r] / 100 * o
      }
      return "vh" === e || "vw" === e ? (l = "vh" === e ? i(document.documentElement.clientHeight, window.innerHeight || 0) : i(document.documentElement.clientWidth, window.innerWidth || 0), l / 100 * o) : o
   }

   function bi(n, t, i, r) {
      var h = [0, 0],
         c = -1 !== ["right", "left"].indexOf(r),
         u = n.split(/(\+|\-)/).map(function (n) {
            return n.trim()
         }),
         f = u.indexOf(s(u, function (n) {
            return -1 !== n.search(/,|\s/)
         })),
         o, e;
      return u[f] && -1 === u[f].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead."), o = /\s*,\s*|\s+/, e = -1 === f ? [u] : [u.slice(0, f).concat([u[f].split(o)[0]]), [u[f].split(o)[1]].concat(u.slice(f + 1))], e = e.map(function (n, r) {
         var f = (1 === r ? !c : c) ? "height" : "width",
            u = !1;
         return n.reduce(function (n, t) {
            return "" === n[n.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (n[n.length - 1] = t, u = !0, n) : u ? (n[n.length - 1] += t, u = !1, n) : n.concat(t)
         }, []).map(function (n) {
            return wi(n, f, t, i)
         })
      }), e.forEach(function (n, t) {
         n.forEach(function (i, r) {
            d(i) && (h[t] += i * ("-" === n[r - 1] ? -1 : 1))
         })
      }), h
   }
   for (var dt = Math.min, f = Math.floor, i = Math.max, ki = ["native code", "[object MutationObserverConstructor]"], di = function (n) {
         return ki.some(function (t) {
            return -1 < (n || "").toString().indexOf(t)
         })
      }, gt = "undefined" != typeof window, ni = ["Edge", "Trident", "Firefox"], ti = 0, nt = 0; nt < ni.length; nt += 1)
      if (gt && 0 <= navigator.userAgent.indexOf(ni[nt])) {
         ti = 1;
         break
      } var tt, gi = gt && di(window.MutationObserver),
      nr = gi ? function (n) {
         var t = !1,
            i = 0,
            r = document.createElement("span"),
            u = new MutationObserver(function () {
               n();
               t = !1
            });
         return u.observe(r, {
               attributes: !0
            }),
            function () {
               t || (t = !0, r.setAttribute("x-index", i), ++i)
            }
      } : function (n) {
         var t = !1;
         return function () {
            t || (t = !0, setTimeout(function () {
               t = !1;
               n()
            }, ti))
         }
      },
      l = function () {
         return void 0 == tt && (tt = -1 !== navigator.appVersion.indexOf("MSIE 10")), tt
      },
      tr = function (n, t) {
         if (!(n instanceof t)) throw new TypeError("Cannot call a class as a function");
      },
      ir = function () {
         function n(n, t) {
            for (var i, r = 0; r < t.length; r++) i = t[r], i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, i.key, i)
         }
         return function (t, i, r) {
            return i && n(t.prototype, i), r && n(t, r), t
         }
      }(),
      a = function (n, t, i) {
         return t in n ? Object.defineProperty(n, t, {
            value: i,
            enumerable: !0,
            configurable: !0,
            writable: !0
         }) : n[t] = i, n
      },
      n = Object.assign || function (n) {
         for (var t, r, i = 1; i < arguments.length; i++)
            for (r in t = arguments[i], t) Object.prototype.hasOwnProperty.call(t, r) && (n[r] = t[r]);
         return n
      },
      ii = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
      it = ii.slice(3),
      rt = {
         FLIP: "flip",
         CLOCKWISE: "clockwise",
         COUNTERCLOCKWISE: "counterclockwise"
      },
      v = function () {
         function t(i, r) {
            var u = this,
               f = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {},
               e;
            tr(this, t);
            this.scheduleUpdate = function () {
               return requestAnimationFrame(u.update)
            };
            this.update = nr(this.update.bind(this));
            this.options = n({}, t.Defaults, f);
            this.state = {
               isDestroyed: !1,
               isCreated: !1,
               scrollParents: []
            };
            this.reference = i.jquery ? i[0] : i;
            this.popper = r.jquery ? r[0] : r;
            this.options.modifiers = {};
            Object.keys(n({}, t.Defaults.modifiers, f.modifiers)).forEach(function (i) {
               u.options.modifiers[i] = n({}, t.Defaults.modifiers[i] || {}, f.modifiers ? f.modifiers[i] : {})
            });
            this.modifiers = Object.keys(this.options.modifiers).map(function (t) {
               return n({
                  name: t
               }, u.options.modifiers[t])
            }).sort(function (n, t) {
               return n.order - t.order
            });
            this.modifiers.forEach(function (n) {
               n.enabled && ut(n.onLoad) && n.onLoad(u.reference, u.popper, u.options, n, u.state)
            });
            this.update();
            e = this.options.eventsEnabled;
            e && this.enableEventListeners();
            this.state.eventsEnabled = e
         }
         return ir(t, [{
            key: "update",
            value: function () {
               return si.call(this)
            }
         }, {
            key: "destroy",
            value: function () {
               return hi.call(this)
            }
         }, {
            key: "enableEventListeners",
            value: function () {
               return li.call(this)
            }
         }, {
            key: "disableEventListeners",
            value: function () {
               return vi.call(this)
            }
         }]), t
      }();
   return v.Utils = ("undefined" == typeof window ? global : window).PopperUtils, v.placements = ii, v.Defaults = {
      placement: "bottom",
      eventsEnabled: !0,
      removeOnDestroy: !1,
      onCreate: function () {},
      onUpdate: function () {},
      modifiers: {
         shift: {
            order: 100,
            enabled: !0,
            fn: function (t) {
               var u = t.placement,
                  c = u.split("-")[0],
                  f = u.split("-")[1];
               if (f) {
                  var e = t.offsets,
                     r = e.reference,
                     o = e.popper,
                     s = -1 !== ["bottom", "top"].indexOf(c),
                     i = s ? "left" : "top",
                     h = s ? "width" : "height",
                     l = {
                        start: a({}, i, r[i]),
                        end: a({}, i, r[i] + r[h] - o[h])
                     };
                  t.offsets.popper = n({}, o, l[f])
               }
               return t
            }
         },
         offset: {
            order: 200,
            enabled: !0,
            fn: function (n, t) {
               var r, f = t.offset,
                  o = n.placement,
                  e = n.offsets,
                  i = e.popper,
                  s = e.reference,
                  u = o.split("-")[0];
               return r = d(+f) ? [+f, 0] : bi(f, i, s, u), "left" === u ? (i.top += r[0], i.left -= r[1]) : "right" === u ? (i.top += r[0], i.left += r[1]) : "top" === u ? (i.left += r[0], i.top -= r[1]) : "bottom" === u && (i.left += r[0], i.top += r[1]), n.popper = i, n
            },
            offset: 0
         },
         preventOverflow: {
            order: 300,
            enabled: !0,
            fn: function (t, u) {
               var o = u.boundariesElement || r(t.instance.popper),
                  e;
               t.instance.reference === o && (o = r(o));
               e = k(t.instance.popper, t.instance.reference, u.padding, o);
               u.boundaries = e;
               var s = u.priority,
                  f = t.offsets.popper,
                  h = {
                     primary: function (n) {
                        var t = f[n];
                        return f[n] < e[n] && !u.escapeWithReference && (t = i(f[n], e[n])), a({}, n, t)
                     },
                     secondary: function (n) {
                        var t = "right" === n ? "left" : "top",
                           i = f[t];
                        return f[n] > e[n] && !u.escapeWithReference && (i = dt(f[t], e[n] - ("right" === n ? f.width : f.height))), a({}, t, i)
                     }
                  };
               return s.forEach(function (t) {
                  var i = -1 === ["left", "top"].indexOf(t) ? "secondary" : "primary";
                  f = n({}, f, h[i](t))
               }), t.offsets.popper = f, t
            },
            priority: ["left", "right", "top", "bottom"],
            padding: 5,
            boundariesElement: "scrollParent"
         },
         keepTogether: {
            order: 400,
            enabled: !0,
            fn: function (n) {
               var s = n.offsets,
                  u = s.popper,
                  i = s.reference,
                  h = n.placement.split("-")[0],
                  r = f,
                  e = -1 !== ["top", "bottom"].indexOf(h),
                  o = e ? "right" : "bottom",
                  t = e ? "left" : "top",
                  c = e ? "width" : "height";
               return u[o] < r(i[t]) && (n.offsets.popper[t] = r(i[t]) - u[c]), u[t] > r(i[o]) && (n.offsets.popper[t] = r(i[o])), n
            }
         },
         arrow: {
            order: 500,
            enabled: !0,
            fn: function (n, r) {
               var f, y, l;
               if (!bt(n.instance.modifiers, "arrow", "keepTogether")) return n;
               if (f = r.element, "string" == typeof f) {
                  if (f = n.instance.popper.querySelector(f), !f) return n
               } else if (!n.instance.popper.contains(f)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), n;
               var p = n.placement.split("-")[0],
                  v = n.offsets,
                  s = v.popper,
                  e = v.reference,
                  h = -1 !== ["left", "right"].indexOf(p),
                  a = h ? "height" : "width",
                  u = h ? "top" : "left",
                  w = h ? "left" : "top",
                  c = h ? "bottom" : "right",
                  o = lt(f)[a];
               return e[c] - o < s[u] && (n.offsets.popper[u] -= s[u] - (e[c] - o)), e[u] + o > s[c] && (n.offsets.popper[u] += e[u] + o - s[c]), y = e[u] + e[a] / 2 - o / 2, l = y - t(n.offsets.popper)[u], l = i(dt(s[a] - o, l), 0), n.arrowElement = f, n.offsets.arrow = {}, n.offsets.arrow[u] = Math.round(l), n.offsets.arrow[w] = "", n
            },
            element: "[x-arrow]"
         },
         flip: {
            order: 600,
            enabled: !0,
            fn: function (t, i) {
               if (yt(t.instance.modifiers, "inner") || t.flipped && t.placement === t.originalPlacement) return t;
               var o = k(t.instance.popper, t.instance.reference, i.padding, i.boundariesElement),
                  r = t.placement.split("-")[0],
                  s = c(r),
                  u = t.placement.split("-")[1] || "",
                  e = [];
               switch (i.behavior) {
                  case rt.FLIP:
                     e = [r, s];
                     break;
                  case rt.CLOCKWISE:
                     e = kt(r);
                     break;
                  case rt.COUNTERCLOCKWISE:
                     e = kt(r, !0);
                     break;
                  default:
                     e = i.behavior
               }
               return e.forEach(function (h, l) {
                  if (r !== h || e.length === l + 1) return t;
                  r = t.placement.split("-")[0];
                  s = c(r);
                  var v = t.offsets.popper,
                     y = t.offsets.reference,
                     a = f,
                     w = "left" === r && a(v.right) > a(y.left) || "right" === r && a(v.left) < a(y.right) || "top" === r && a(v.bottom) > a(y.top) || "bottom" === r && a(v.top) < a(y.bottom),
                     b = a(v.left) < a(o.left),
                     k = a(v.right) > a(o.right),
                     d = a(v.top) < a(o.top),
                     g = a(v.bottom) > a(o.bottom),
                     nt = "left" === r && b || "right" === r && k || "top" === r && d || "bottom" === r && g,
                     p = -1 !== ["top", "bottom"].indexOf(r),
                     tt = !!i.flipVariations && (p && "start" === u && b || p && "end" === u && k || !p && "start" === u && d || !p && "end" === u && g);
                  (w || nt || tt) && (t.flipped = !0, (w || nt) && (r = e[l + 1]), tt && (u = pi(u)), t.placement = r + (u ? "-" + u : ""), t.offsets.popper = n({}, t.offsets.popper, at(t.instance.popper, t.offsets.reference, t.placement)), t = vt(t.instance.modifiers, t, "flip"))
               }), t
            },
            behavior: "flip",
            padding: 5,
            boundariesElement: "viewport"
         },
         inner: {
            order: 700,
            enabled: !1,
            fn: function (n) {
               var i = n.placement,
                  u = i.split("-")[0],
                  f = n.offsets,
                  r = f.popper,
                  o = f.reference,
                  e = -1 !== ["left", "right"].indexOf(u),
                  s = -1 === ["top", "left"].indexOf(u);
               return r[e ? "left" : "top"] = o[i] - (s ? r[e ? "width" : "height"] : 0), n.placement = c(i), n.offsets.popper = t(r), n
            }
         },
         hide: {
            order: 800,
            enabled: !0,
            fn: function (n) {
               if (!bt(n.instance.modifiers, "hide", "preventOverflow")) return n;
               var t = n.offsets.reference,
                  i = s(n.instance.modifiers, function (n) {
                     return "preventOverflow" === n.name
                  }).boundaries;
               if (t.bottom < i.top || t.left > i.right || t.top > i.bottom || t.right < i.left) {
                  if (!0 === n.hide) return n;
                  n.hide = !0;
                  n.attributes["x-out-of-boundaries"] = ""
               } else {
                  if (!1 === n.hide) return n;
                  n.hide = !1;
                  n.attributes["x-out-of-boundaries"] = !1
               }
               return n
            }
         },
         computeStyle: {
            order: 850,
            enabled: !0,
            fn: function (t, i) {
               var g = i.x,
                  nt = i.y,
                  e = t.offsets.popper,
                  l = s(t.instance.modifiers, function (n) {
                     return "applyStyle" === n.name
                  }).gpuAcceleration,
                  b, k, d;
               void 0 !== l && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
               var a, v, tt = void 0 === l ? i.gpuAcceleration : l,
                  it = r(t.instance.popper),
                  y = w(it),
                  u = {
                     position: e.position
                  },
                  c = {
                     left: f(e.left),
                     top: f(e.top),
                     bottom: f(e.bottom),
                     right: f(e.right)
                  },
                  o = "bottom" === g ? "top" : "bottom",
                  h = "right" === nt ? "left" : "right",
                  p = pt("transform");
               return (v = "bottom" == o ? -y.height + c.bottom : c.top, a = "right" == h ? -y.width + c.right : c.left, tt && p) ? (u[p] = "translate3d(" + a + "px, " + v + "px, 0)", u[o] = 0, u[h] = 0, u.willChange = "transform") : (b = "bottom" == o ? -1 : 1, k = "right" == h ? -1 : 1, u[o] = v * b, u[h] = a * k, u.willChange = o + ", " + h), d = {
                  "x-placement": t.placement
               }, t.attributes = n({}, d, t.attributes), t.styles = n({}, u, t.styles), t
            },
            gpuAcceleration: !0,
            x: "bottom",
            y: "right"
         },
         applyStyle: {
            order: 900,
            enabled: !0,
            fn: function (n) {
               return g(n.instance.popper, n.styles), yi(n.instance.popper, n.attributes), n.offsets.arrow && g(n.arrowElement, n.offsets.arrow), n
            },
            onLoad: function (n, t, i, r, u) {
               var f = ct(u, t, n),
                  e = ht(i.placement, f, t, n, i.modifiers.flip.boundariesElement, i.modifiers.flip.padding);
               return t.setAttribute("x-placement", e), g(t, {
                  position: "absolute"
               }), i
            },
            gpuAcceleration: void 0
         }
      }
   }, v
});
! function (n, t) {
   "object" == typeof exports && "undefined" != typeof module ? t(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], t) : t(n.bootstrap = {}, n.jQuery, n.Popper)
}(this, function (n, t, i) {
   "use strict";

   function of (n, t) {
      for (var i, r = 0; r < t.length; r++) i = t[r], i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, i.key, i)
   }

   function g(n, t, i) {
      return t && of (n.prototype, t), i && of (n, i), n
   }

   function v(n) {
      for (var i, r, t = 1; t < arguments.length; t++) i = null != arguments[t] ? arguments[t] : {}, r = Object.keys(i), "function" == typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(i).filter(function (n) {
         return Object.getOwnPropertyDescriptor(i, n).enumerable
      }))), r.forEach(function (t) {
         var r, u, f;
         r = n;
         f = i[u = t];
         u in r ? Object.defineProperty(r, u, {
            value: f,
            enumerable: !0,
            configurable: !0,
            writable: !0
         }) : r[u] = f
      });
      return n
   }
   t = t && t.hasOwnProperty("default") ? t.default : t;
   i = i && i.hasOwnProperty("default") ? i.default : i;
   var y, dt, er, or, sf, sr, hf, cf, lf, ht, l, gt, hr, cr, lr, af, ni, vf, yf, ou, pf, wf, bf, su, hu, ti, e, ct, pi, nt, cu, kf, ar, df, wi, bi, gf, ne, tt, te, ut, ie, re, ue, fe, ee, oe, vr, se, he, ce, le, ae, lt, s, at, vt, ii, ve, yr, ye, ri, ft, ki, di, pr, lu, pe, we, au, ui, o, yt, gi, it, wr, be, ke, w, vu, et, de, ge, no, yu, to, nr, io, br, ro, uo, fo, eo, oo, so, ho, co, lo, ao, rt, r, pt, tr, p, vo, kr, yo, c, po, wo, pu, wt, ir, bo, ko, go, wu, bu, fi, u, ot, dr, b, ns, ku, ts, is, rs, us, ei, gr, fs, oi, si, es, os, hi, nu, ss, hs, rr, d, bt, tu, k, cs, du, ls, as, vs, ys, ps, ws, bs, ks, ur, a, st, iu, fr, ds, gu, gs, ru, nh, kt, th, ih, nf, uu, rh, tf, uh, fh, eh, oh, rf, ci, h, fu, li, sh, ai, hh, vi, ch, lh, uf, ah, vh, ff, ef, yh, ph, wh, yi, f = function (n) {
         function r(i) {
            var u = this,
               r = !1;
            return n(this).one(t.TRANSITION_END, function () {
               r = !0
            }), setTimeout(function () {
               r || t.triggerTransitionEnd(u)
            }, i), this
         }
         var i = "transitionend",
            t = {
               TRANSITION_END: "bsTransitionEnd",
               getUID: function (n) {
                  for (; n += ~~(1e6 * Math.random()), document.getElementById(n););
                  return n
               },
               getSelectorFromElement: function (n) {
                  var t = n.getAttribute("data-target");
                  t && "#" !== t || (t = n.getAttribute("href") || "");
                  try {
                     return document.querySelector(t) ? t : null
                  } catch (n) {
                     return null
                  }
               },
               getTransitionDurationFromElement: function (t) {
                  if (!t) return 0;
                  var i = n(t).css("transition-duration");
                  return parseFloat(i) ? (i = i.split(",")[0], 1e3 * parseFloat(i)) : 0
               },
               reflow: function (n) {
                  return n.offsetHeight
               },
               triggerTransitionEnd: function (t) {
                  n(t).trigger(i)
               },
               supportsTransitionEnd: function () {
                  return Boolean(i)
               },
               isElement: function (n) {
                  return (n[0] || n).nodeType
               },
               typeCheckConfig: function (n, i, r) {
                  var u, s;
                  for (u in r)
                     if (Object.prototype.hasOwnProperty.call(r, u)) {
                        var e = r[u],
                           f = i[u],
                           o = f && t.isElement(f) ? "element" : (s = f, {}.toString.call(s).match(/\s([a-z]+)/i)[1].toLowerCase());
                        if (!new RegExp(e).test(o)) throw new Error(n.toUpperCase() + ': Option "' + u + '" provided type "' + o + '" but expected type "' + e + '".');
                     }
               }
            };
         return n.fn.emulateTransitionEnd = r, n.event.special[t.TRANSITION_END] = {
            bindType: i,
            delegateType: i,
            handle: function (t) {
               if (n(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
            }
         }, t
      }(t),
      bh = (dt = "alert", or = "." + (er = "bs.alert"), sf = (y = t).fn[dt], sr = {
         CLOSE: "close" + or,
         CLOSED: "closed" + or,
         CLICK_DATA_API: "click" + or + ".data-api"
      }, hf = "alert", cf = "fade", lf = "show", ht = function () {
         function n(n) {
            this._element = n
         }
         var t = n.prototype;
         return t.close = function (n) {
            var t = this._element;
            n && (t = this._getRootElement(n));
            this._triggerCloseEvent(t).isDefaultPrevented() || this._removeElement(t)
         }, t.dispose = function () {
            y.removeData(this._element, er);
            this._element = null
         }, t._getRootElement = function (n) {
            var i = f.getSelectorFromElement(n),
               t = !1;
            return i && (t = document.querySelector(i)), t || (t = y(n).closest("." + hf)[0]), t
         }, t._triggerCloseEvent = function (n) {
            var t = y.Event(sr.CLOSE);
            return y(n).trigger(t), t
         }, t._removeElement = function (n) {
            var i = this,
               t;
            (y(n).removeClass(lf), y(n).hasClass(cf)) ? (t = f.getTransitionDurationFromElement(n), y(n).one(f.TRANSITION_END, function (t) {
               return i._destroyElement(n, t)
            }).emulateTransitionEnd(t)) : this._destroyElement(n)
         }, t._destroyElement = function (n) {
            y(n).detach().trigger(sr.CLOSED).remove()
         }, n._jQueryInterface = function (t) {
            return this.each(function () {
               var r = y(this),
                  i = r.data(er);
               i || (i = new n(this), r.data(er, i));
               "close" === t && i[t](this)
            })
         }, n._handleDismiss = function (n) {
            return function (t) {
               t && t.preventDefault();
               n.close(this)
            }
         }, g(n, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }]), n
      }(), y(document).on(sr.CLICK_DATA_API, '[data-dismiss="alert"]', ht._handleDismiss(new ht)), y.fn[dt] = ht._jQueryInterface, y.fn[dt].Constructor = ht, y.fn[dt].noConflict = function () {
         return y.fn[dt] = sf, ht._jQueryInterface
      }, ht),
      kh = (gt = "button", cr = "." + (hr = "bs.button"), lr = ".data-api", af = (l = t).fn[gt], ni = "active", vf = "btn", ou = '[data-toggle^="button"]', pf = '[data-toggle="buttons"]', wf = "input", bf = ".active", su = ".btn", hu = {
         CLICK_DATA_API: "click" + cr + lr,
         FOCUS_BLUR_DATA_API: (yf = "focus") + cr + lr + " blur" + cr + lr
      }, ti = function () {
         function n(n) {
            this._element = n
         }
         var t = n.prototype;
         return t.toggle = function () {
            var i = !0,
               u = !0,
               t = l(this._element).closest(pf)[0],
               n, r;
            if (t && (n = this._element.querySelector(wf), n)) {
               if ("radio" === n.type && (n.checked && this._element.classList.contains(ni) ? i = !1 : (r = t.querySelector(bf), r && l(r).removeClass(ni))), i) {
                  if (n.hasAttribute("disabled") || t.hasAttribute("disabled") || n.classList.contains("disabled") || t.classList.contains("disabled")) return;
                  n.checked = !this._element.classList.contains(ni);
                  l(n).trigger("change")
               }
               n.focus();
               u = !1
            }
            u && this._element.setAttribute("aria-pressed", !this._element.classList.contains(ni));
            i && l(this._element).toggleClass(ni)
         }, t.dispose = function () {
            l.removeData(this._element, hr);
            this._element = null
         }, n._jQueryInterface = function (t) {
            return this.each(function () {
               var i = l(this).data(hr);
               i || (i = new n(this), l(this).data(hr, i));
               "toggle" === t && i[t]()
            })
         }, g(n, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }]), n
      }(), l(document).on(hu.CLICK_DATA_API, ou, function (n) {
         n.preventDefault();
         var t = n.target;
         l(t).hasClass(vf) || (t = l(t).closest(su));
         ti._jQueryInterface.call(l(t), "toggle")
      }).on(hu.FOCUS_BLUR_DATA_API, ou, function (n) {
         var t = l(n.target).closest(su)[0];
         l(t).toggleClass(yf, /^focus(in)?$/.test(n.type))
      }), l.fn[gt] = ti._jQueryInterface, l.fn[gt].Constructor = ti, l.fn[gt].noConflict = function () {
         return l.fn[gt] = af, ti._jQueryInterface
      }, ti),
      dh = (ct = "carousel", nt = "." + (pi = "bs.carousel"), cu = ".data-api", kf = (e = t).fn[ct], ar = {
         interval: 5e3,
         keyboard: !0,
         slide: !1,
         pause: "hover",
         wrap: !0
      }, df = {
         interval: "(number|boolean)",
         keyboard: "boolean",
         slide: "(boolean|string)",
         pause: "(string|boolean)",
         wrap: "boolean"
      }, wi = "next", bi = "prev", gf = "left", ne = "right", tt = {
         SLIDE: "slide" + nt,
         SLID: "slid" + nt,
         KEYDOWN: "keydown" + nt,
         MOUSEENTER: "mouseenter" + nt,
         MOUSELEAVE: "mouseleave" + nt,
         TOUCHEND: "touchend" + nt,
         LOAD_DATA_API: "load" + nt + cu,
         CLICK_DATA_API: "click" + nt + cu
      }, te = "carousel", ut = "active", ie = "slide", re = "carousel-item-right", ue = "carousel-item-left", fe = "carousel-item-next", ee = "carousel-item-prev", oe = ".active", vr = ".active.carousel-item", se = ".carousel-item", he = ".carousel-item-next, .carousel-item-prev", ce = ".carousel-indicators", le = "[data-slide], [data-slide-to]", ae = '[data-ride="carousel"]', lt = function () {
         function t(n, t) {
            this._items = null;
            this._interval = null;
            this._activeElement = null;
            this._isPaused = !1;
            this._isSliding = !1;
            this.touchTimeout = null;
            this._config = this._getConfig(t);
            this._element = e(n)[0];
            this._indicatorsElement = this._element.querySelector(ce);
            this._addEventListeners()
         }
         var n = t.prototype;
         return n.next = function () {
            this._isSliding || this._slide(wi)
         }, n.nextWhenVisible = function () {
            !document.hidden && e(this._element).is(":visible") && "hidden" !== e(this._element).css("visibility") && this.next()
         }, n.prev = function () {
            this._isSliding || this._slide(bi)
         }, n.pause = function (n) {
            n || (this._isPaused = !0);
            this._element.querySelector(he) && (f.triggerTransitionEnd(this._element), this.cycle(!0));
            clearInterval(this._interval);
            this._interval = null
         }, n.cycle = function (n) {
            n || (this._isPaused = !1);
            this._interval && (clearInterval(this._interval), this._interval = null);
            this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
         }, n.to = function (n) {
            var r = this,
               t, i;
            if (this._activeElement = this._element.querySelector(vr), t = this._getItemIndex(this._activeElement), !(n > this._items.length - 1 || n < 0))
               if (this._isSliding) e(this._element).one(tt.SLID, function () {
                  return r.to(n)
               });
               else {
                  if (t === n) return this.pause(), void this.cycle();
                  i = t < n ? wi : bi;
                  this._slide(i, this._items[n])
               }
         }, n.dispose = function () {
            e(this._element).off(nt);
            e.removeData(this._element, pi);
            this._items = null;
            this._config = null;
            this._element = null;
            this._interval = null;
            this._isPaused = null;
            this._isSliding = null;
            this._activeElement = null;
            this._indicatorsElement = null
         }, n._getConfig = function (n) {
            return n = v({}, ar, n), f.typeCheckConfig(ct, n, df), n
         }, n._addEventListeners = function () {
            var n = this;
            this._config.keyboard && e(this._element).on(tt.KEYDOWN, function (t) {
               return n._keydown(t)
            });
            "hover" === this._config.pause && (e(this._element).on(tt.MOUSEENTER, function (t) {
               return n.pause(t)
            }).on(tt.MOUSELEAVE, function (t) {
               return n.cycle(t)
            }), "ontouchstart" in document.documentElement && e(this._element).on(tt.TOUCHEND, function () {
               n.pause();
               n.touchTimeout && clearTimeout(n.touchTimeout);
               n.touchTimeout = setTimeout(function (t) {
                  return n.cycle(t)
               }, 500 + n._config.interval)
            }))
         }, n._keydown = function (n) {
            if (!/input|textarea/i.test(n.target.tagName)) switch (n.which) {
               case 37:
                  n.preventDefault();
                  this.prev();
                  break;
               case 39:
                  n.preventDefault();
                  this.next()
            }
         }, n._getItemIndex = function (n) {
            return this._items = n && n.parentNode ? [].slice.call(n.parentNode.querySelectorAll(se)) : [], this._items.indexOf(n)
         }, n._getItemByDirection = function (n, t) {
            var u = n === wi,
               f = n === bi,
               i = this._getItemIndex(t),
               e = this._items.length - 1,
               r;
            return (f && 0 === i || u && i === e) && !this._config.wrap ? t : (r = (i + (n === bi ? -1 : 1)) % this._items.length, -1 === r ? this._items[this._items.length - 1] : this._items[r])
         }, n._triggerSlideEvent = function (n, t) {
            var r = this._getItemIndex(n),
               u = this._getItemIndex(this._element.querySelector(vr)),
               i = e.Event(tt.SLIDE, {
                  relatedTarget: n,
                  direction: t,
                  from: u,
                  to: r
               });
            return e(this._element).trigger(i), i
         }, n._setActiveIndicatorElement = function (n) {
            var i, t;
            this._indicatorsElement && (i = [].slice.call(this._indicatorsElement.querySelectorAll(oe)), e(i).removeClass(ut), t = this._indicatorsElement.children[this._getItemIndex(n)], t && e(t).addClass(ut))
         }, n._slide = function (n, t) {
            var u, o, s, c = this,
               r = this._element.querySelector(vr),
               v = this._getItemIndex(r),
               i = t || r && this._getItemByDirection(n, r),
               y = this._getItemIndex(i),
               l = Boolean(this._interval),
               h, a;
            (n === wi ? (u = ue, o = fe, s = gf) : (u = re, o = ee, s = ne), i && e(i).hasClass(ut)) ? this._isSliding = !1: !this._triggerSlideEvent(i, s).isDefaultPrevented() && r && i && (this._isSliding = !0, l && this.pause(), this._setActiveIndicatorElement(i), h = e.Event(tt.SLID, {
               relatedTarget: i,
               direction: s,
               from: v,
               to: y
            }), e(this._element).hasClass(ie) ? (e(i).addClass(o), f.reflow(i), e(r).addClass(u), e(i).addClass(u), a = f.getTransitionDurationFromElement(r), e(r).one(f.TRANSITION_END, function () {
               e(i).removeClass(u + " " + o).addClass(ut);
               e(r).removeClass(ut + " " + o + " " + u);
               c._isSliding = !1;
               setTimeout(function () {
                  return e(c._element).trigger(h)
               }, 0)
            }).emulateTransitionEnd(a)) : (e(r).removeClass(ut), e(i).addClass(ut), this._isSliding = !1, e(this._element).trigger(h)), l && this.cycle())
         }, t._jQueryInterface = function (n) {
            return this.each(function () {
               var i = e(this).data(pi),
                  r = v({}, ar, e(this).data()),
                  u;
               if ("object" == typeof n && (r = v({}, r, n)), u = "string" == typeof n ? n : r.slide, i || (i = new t(this, r), e(this).data(pi, i)), "number" == typeof n) i.to(n);
               else if ("string" == typeof u) {
                  if ("undefined" == typeof i[u]) throw new TypeError('No method named "' + u + '"');
                  i[u]()
               } else r.interval && (i.pause(), i.cycle())
            })
         }, t._dataApiClickHandler = function (n) {
            var o = f.getSelectorFromElement(this),
               i, u, r;
            o && (i = e(o)[0], i && e(i).hasClass(te) && (u = v({}, e(i).data(), e(this).data()), r = this.getAttribute("data-slide-to"), r && (u.interval = !1), t._jQueryInterface.call(e(i), u), r && e(i).data(pi).to(r), n.preventDefault()))
         }, g(t, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return ar
            }
         }]), t
      }(), e(document).on(tt.CLICK_DATA_API, le, lt._dataApiClickHandler), e(window).on(tt.LOAD_DATA_API, function () {
         for (var t, i = [].slice.call(document.querySelectorAll(ae)), n = 0, r = i.length; n < r; n++) t = e(i[n]), lt._jQueryInterface.call(t, t.data())
      }), e.fn[ct] = lt._jQueryInterface, e.fn[ct].Constructor = lt, e.fn[ct].noConflict = function () {
         return e.fn[ct] = kf, lt._jQueryInterface
      }, lt),
      gh = (at = "collapse", ii = "." + (vt = "bs.collapse"), ve = (s = t).fn[at], yr = {
         toggle: !0,
         parent: ""
      }, ye = {
         toggle: "boolean",
         parent: "(string|element)"
      }, ri = {
         SHOW: "show" + ii,
         SHOWN: "shown" + ii,
         HIDE: "hide" + ii,
         HIDDEN: "hidden" + ii,
         CLICK_DATA_API: "click" + ii + ".data-api"
      }, ft = "show", ki = "collapse", di = "collapsing", pr = "collapsed", lu = "width", pe = "height", we = ".show, .collapsing", au = '[data-toggle="collapse"]', ui = function () {
         function t(n, t) {
            this._isTransitioning = !1;
            this._element = n;
            this._config = this._getConfig(t);
            this._triggerArray = s.makeArray(document.querySelectorAll('[data-toggle="collapse"][href="#' + n.id + '"],[data-toggle="collapse"][data-target="#' + n.id + '"]'));
            for (var u = [].slice.call(document.querySelectorAll(au)), i = 0, o = u.length; i < o; i++) {
               var e = u[i],
                  r = f.getSelectorFromElement(e),
                  h = [].slice.call(document.querySelectorAll(r)).filter(function (t) {
                     return t === n
                  });
               null !== r && 0 < h.length && (this._selector = r, this._triggerArray.push(e))
            }
            this._parent = this._config.parent ? this._getParent() : null;
            this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray);
            this._config.toggle && this.toggle()
         }
         var n = t.prototype;
         return n.toggle = function () {
            s(this._element).hasClass(ft) ? this.hide() : this.show()
         }, n.show = function () {
            var n, u, r = this,
               e, i, o, h;
            this._isTransitioning || s(this._element).hasClass(ft) || (this._parent && 0 === (n = [].slice.call(this._parent.querySelectorAll(we)).filter(function (n) {
               return n.getAttribute("data-parent") === r._config.parent
            })).length && (n = null), n && (u = s(n).not(this._selector).data(vt)) && u._isTransitioning) || (e = s.Event(ri.SHOW), (s(this._element).trigger(e), e.isDefaultPrevented()) || (n && (t._jQueryInterface.call(s(n).not(this._selector), "hide"), u || s(n).data(vt, null)), i = this._getDimension(), s(this._element).removeClass(ki).addClass(di), this._element.style[i] = 0, this._triggerArray.length && s(this._triggerArray).removeClass(pr).attr("aria-expanded", !0), this.setTransitioning(!0), o = "scroll" + (i[0].toUpperCase() + i.slice(1)), h = f.getTransitionDurationFromElement(this._element), s(this._element).one(f.TRANSITION_END, function () {
               s(r._element).removeClass(di).addClass(ki).addClass(ft);
               r._element.style[i] = "";
               r.setTransitioning(!1);
               s(r._element).trigger(ri.SHOWN)
            }).emulateTransitionEnd(h), this._element.style[i] = this._element[o] + "px"))
         }, n.hide = function () {
            var o = this,
               i, n, r, t, u, e, h;
            if (!this._isTransitioning && s(this._element).hasClass(ft) && (i = s.Event(ri.HIDE), s(this._element).trigger(i), !i.isDefaultPrevented())) {
               if (n = this._getDimension(), this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", f.reflow(this._element), s(this._element).addClass(di).removeClass(ki).removeClass(ft), r = this._triggerArray.length, 0 < r)
                  for (t = 0; t < r; t++) u = this._triggerArray[t], e = f.getSelectorFromElement(u), null !== e && (s([].slice.call(document.querySelectorAll(e))).hasClass(ft) || s(u).addClass(pr).attr("aria-expanded", !1));
               this.setTransitioning(!0);
               this._element.style[n] = "";
               h = f.getTransitionDurationFromElement(this._element);
               s(this._element).one(f.TRANSITION_END, function () {
                  o.setTransitioning(!1);
                  s(o._element).removeClass(di).addClass(ki).trigger(ri.HIDDEN)
               }).emulateTransitionEnd(h)
            }
         }, n.setTransitioning = function (n) {
            this._isTransitioning = n
         }, n.dispose = function () {
            s.removeData(this._element, vt);
            this._config = null;
            this._parent = null;
            this._element = null;
            this._triggerArray = null;
            this._isTransitioning = null
         }, n._getConfig = function (n) {
            return (n = v({}, yr, n)).toggle = Boolean(n.toggle), f.typeCheckConfig(at, n, ye), n
         }, n._getDimension = function () {
            return s(this._element).hasClass(lu) ? lu : pe
         }, n._getParent = function () {
            var u = this,
               n = null,
               i, r;
            return f.isElement(this._config.parent) ? (n = this._config.parent, "undefined" != typeof this._config.parent.jquery && (n = this._config.parent[0])) : n = document.querySelector(this._config.parent), i = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]', r = [].slice.call(n.querySelectorAll(i)), s(r).each(function (n, i) {
               u._addAriaAndCollapsedClass(t._getTargetFromElement(i), [i])
            }), n
         }, n._addAriaAndCollapsedClass = function (n, t) {
            if (n) {
               var i = s(n).hasClass(ft);
               t.length && s(t).toggleClass(pr, !i).attr("aria-expanded", i)
            }
         }, t._getTargetFromElement = function (n) {
            var t = f.getSelectorFromElement(n);
            return t ? document.querySelector(t) : null
         }, t._jQueryInterface = function (n) {
            return this.each(function () {
               var r = s(this),
                  i = r.data(vt),
                  u = v({}, yr, r.data(), "object" == typeof n && n ? n : {});
               if (!i && u.toggle && /show|hide/.test(n) && (u.toggle = !1), i || (i = new t(this, u), r.data(vt, i)), "string" == typeof n) {
                  if ("undefined" == typeof i[n]) throw new TypeError('No method named "' + n + '"');
                  i[n]()
               }
            })
         }, g(t, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return yr
            }
         }]), t
      }(), s(document).on(ri.CLICK_DATA_API, au, function (n) {
         "A" === n.currentTarget.tagName && n.preventDefault();
         var t = s(this),
            i = f.getSelectorFromElement(this),
            r = [].slice.call(document.querySelectorAll(i));
         s(r).each(function () {
            var n = s(this),
               i = n.data(vt) ? "toggle" : t.data();
            ui._jQueryInterface.call(n, i)
         })
      }), s.fn[at] = ui._jQueryInterface, s.fn[at].Constructor = ui, s.fn[at].noConflict = function () {
         return s.fn[at] = ve, ui._jQueryInterface
      }, ui),
      nc = (yt = "dropdown", it = "." + (gi = "bs.dropdown"), wr = ".data-api", be = (o = t).fn[yt], ke = new RegExp("38|40|27"), w = {
         HIDE: "hide" + it,
         HIDDEN: "hidden" + it,
         SHOW: "show" + it,
         SHOWN: "shown" + it,
         CLICK: "click" + it,
         CLICK_DATA_API: "click" + it + wr,
         KEYDOWN_DATA_API: "keydown" + it + wr,
         KEYUP_DATA_API: "keyup" + it + wr
      }, vu = "disabled", et = "show", de = "dropup", ge = "dropright", no = "dropleft", yu = "dropdown-menu-right", to = "position-static", nr = '[data-toggle="dropdown"]', io = ".dropdown form", br = ".dropdown-menu", ro = ".navbar-nav", uo = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", fo = "top-start", eo = "top-end", oo = "bottom-start", so = "bottom-end", ho = "right-start", co = "left-start", lo = {
         offset: 0,
         flip: !0,
         boundary: "scrollParent",
         reference: "toggle",
         display: "dynamic"
      }, ao = {
         offset: "(number|string|function)",
         flip: "boolean",
         boundary: "(string|element)",
         reference: "(string|element)",
         display: "string"
      }, rt = function () {
         function n(n, t) {
            this._element = n;
            this._popper = null;
            this._config = this._getConfig(t);
            this._menu = this._getMenuElement();
            this._inNavbar = this._detectNavbar();
            this._addEventListeners()
         }
         var t = n.prototype;
         return t.toggle = function () {
            var t, s, u, e, r;
            if (!this._element.disabled && !o(this._element).hasClass(vu) && (t = n._getParentFromElement(this._element), s = o(this._menu).hasClass(et), (n._clearMenus(), !s) && (u = {
                  relatedTarget: this._element
               }, e = o.Event(w.SHOW, u), o(t).trigger(e), !e.isDefaultPrevented()))) {
               if (!this._inNavbar) {
                  if ("undefined" == typeof i) throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");
                  r = this._element;
                  "parent" === this._config.reference ? r = t : f.isElement(this._config.reference) && (r = this._config.reference, "undefined" != typeof this._config.reference.jquery && (r = this._config.reference[0]));
                  "scrollParent" !== this._config.boundary && o(t).addClass(to);
                  this._popper = new i(r, this._menu, this._getPopperConfig())
               }
               "ontouchstart" in document.documentElement && 0 === o(t).closest(ro).length && o(document.body).children().on("mouseover", null, o.noop);
               this._element.focus();
               this._element.setAttribute("aria-expanded", !0);
               o(this._menu).toggleClass(et);
               o(t).toggleClass(et).trigger(o.Event(w.SHOWN, u))
            }
         }, t.dispose = function () {
            o.removeData(this._element, gi);
            o(this._element).off(it);
            this._element = null;
            (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null)
         }, t.update = function () {
            this._inNavbar = this._detectNavbar();
            null !== this._popper && this._popper.scheduleUpdate()
         }, t._addEventListeners = function () {
            var n = this;
            o(this._element).on(w.CLICK, function (t) {
               t.preventDefault();
               t.stopPropagation();
               n.toggle()
            })
         }, t._getConfig = function (n) {
            return n = v({}, this.constructor.Default, o(this._element).data(), n), f.typeCheckConfig(yt, n, this.constructor.DefaultType), n
         }, t._getMenuElement = function () {
            if (!this._menu) {
               var t = n._getParentFromElement(this._element);
               t && (this._menu = t.querySelector(br))
            }
            return this._menu
         }, t._getPlacement = function () {
            var t = o(this._element.parentNode),
               n = oo;
            return t.hasClass(de) ? (n = fo, o(this._menu).hasClass(yu) && (n = eo)) : t.hasClass(ge) ? n = ho : t.hasClass(no) ? n = co : o(this._menu).hasClass(yu) && (n = so), n
         }, t._detectNavbar = function () {
            return 0 < o(this._element).closest(".navbar").length
         }, t._getPopperConfig = function () {
            var i = this,
               n = {},
               t;
            return "function" == typeof this._config.offset ? n.fn = function (n) {
               return n.offsets = v({}, n.offsets, i._config.offset(n.offsets) || {}), n
            } : n.offset = this._config.offset, t = {
               placement: this._getPlacement(),
               modifiers: {
                  offset: n,
                  flip: {
                     enabled: this._config.flip
                  },
                  preventOverflow: {
                     boundariesElement: this._config.boundary
                  }
               }
            }, "static" === this._config.display && (t.modifiers.applyStyle = {
               enabled: !1
            }), t
         }, n._jQueryInterface = function (t) {
            return this.each(function () {
               var i = o(this).data(gi);
               if (i || (i = new n(this, "object" == typeof t ? t : null), o(this).data(gi, i)), "string" == typeof t) {
                  if ("undefined" == typeof i[t]) throw new TypeError('No method named "' + t + '"');
                  i[t]()
               }
            })
         }, n._clearMenus = function (t) {
            var h, e;
            if (!t || 3 !== t.which && ("keyup" !== t.type || 9 === t.which))
               for (var r = [].slice.call(document.querySelectorAll(nr)), i = 0, c = r.length; i < c; i++) {
                  var u = n._getParentFromElement(r[i]),
                     s = o(r[i]).data(gi),
                     f = {
                        relatedTarget: r[i]
                     };
                  (t && "click" === t.type && (f.clickEvent = t), s) && (h = s._menu, !o(u).hasClass(et) || t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && 9 === t.which) && o.contains(u, t.target) || (e = o.Event(w.HIDE, f), o(u).trigger(e), e.isDefaultPrevented() || ("ontouchstart" in document.documentElement && o(document.body).children().off("mouseover", null, o.noop), r[i].setAttribute("aria-expanded", "false"), o(h).removeClass(et), o(u).removeClass(et).trigger(o.Event(w.HIDDEN, f)))))
               }
         }, n._getParentFromElement = function (n) {
            var t, i = f.getSelectorFromElement(n);
            return i && (t = document.querySelector(i)), t || n.parentNode
         }, n._dataApiKeydownHandler = function (t) {
            var u, f, r, i, e;
            (/input|textarea/i.test(t.target.tagName) ? 32 === t.which || 27 !== t.which && (40 !== t.which && 38 !== t.which || o(t.target).closest(br).length) : !ke.test(t.which)) || (t.preventDefault(), t.stopPropagation(), this.disabled || o(this).hasClass(vu)) || (u = n._getParentFromElement(this), f = o(u).hasClass(et), (f || 27 === t.which && 32 === t.which) && (!f || 27 !== t.which && 32 !== t.which) ? (r = [].slice.call(u.querySelectorAll(uo)), 0 !== r.length && (i = r.indexOf(t.target), 38 === t.which && 0 < i && i--, 40 === t.which && i < r.length - 1 && i++, i < 0 && (i = 0), r[i].focus())) : (27 === t.which && (e = u.querySelector(nr), o(e).trigger("focus")), o(this).trigger("click")))
         }, g(n, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return lo
            }
         }, {
            key: "DefaultType",
            get: function () {
               return ao
            }
         }]), n
      }(), o(document).on(w.KEYDOWN_DATA_API, nr, rt._dataApiKeydownHandler).on(w.KEYDOWN_DATA_API, br, rt._dataApiKeydownHandler).on(w.CLICK_DATA_API + " " + w.KEYUP_DATA_API, rt._clearMenus).on(w.CLICK_DATA_API, nr, function (n) {
         n.preventDefault();
         n.stopPropagation();
         rt._jQueryInterface.call(o(this), "toggle")
      }).on(w.CLICK_DATA_API, io, function (n) {
         n.stopPropagation()
      }), o.fn[yt] = rt._jQueryInterface, o.fn[yt].Constructor = rt, o.fn[yt].noConflict = function () {
         return o.fn[yt] = be, rt._jQueryInterface
      }, rt),
      tc = (pt = "modal", p = "." + (tr = "bs.modal"), vo = (r = t).fn[pt], kr = {
         backdrop: !0,
         keyboard: !0,
         focus: !0,
         show: !0
      }, yo = {
         backdrop: "(boolean|string)",
         keyboard: "boolean",
         focus: "boolean",
         show: "boolean"
      }, c = {
         HIDE: "hide" + p,
         HIDDEN: "hidden" + p,
         SHOW: "show" + p,
         SHOWN: "shown" + p,
         FOCUSIN: "focusin" + p,
         RESIZE: "resize" + p,
         CLICK_DISMISS: "click.dismiss" + p,
         KEYDOWN_DISMISS: "keydown.dismiss" + p,
         MOUSEUP_DISMISS: "mouseup.dismiss" + p,
         MOUSEDOWN_DISMISS: "mousedown.dismiss" + p,
         CLICK_DATA_API: "click" + p + ".data-api"
      }, po = "modal-scrollbar-measure", wo = "modal-backdrop", pu = "modal-open", wt = "fade", ir = "show", bo = ".modal-dialog", ko = '[data-toggle="modal"]', go = '[data-dismiss="modal"]', wu = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", bu = ".sticky-top", fi = function () {
         function t(n, t) {
            this._config = this._getConfig(t);
            this._element = n;
            this._dialog = n.querySelector(bo);
            this._backdrop = null;
            this._isShown = !1;
            this._isBodyOverflowing = !1;
            this._ignoreBackdropClick = !1;
            this._scrollbarWidth = 0
         }
         var n = t.prototype;
         return n.toggle = function (n) {
            return this._isShown ? this.hide() : this.show(n)
         }, n.show = function (n) {
            var t = this,
               i;
            this._isTransitioning || this._isShown || (r(this._element).hasClass(wt) && (this._isTransitioning = !0), i = r.Event(c.SHOW, {
               relatedTarget: n
            }), r(this._element).trigger(i), this._isShown || i.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), r(document.body).addClass(pu), this._setEscapeEvent(), this._setResizeEvent(), r(this._element).on(c.CLICK_DISMISS, go, function (n) {
               return t.hide(n)
            }), r(this._dialog).on(c.MOUSEDOWN_DISMISS, function () {
               r(t._element).one(c.MOUSEUP_DISMISS, function (n) {
                  r(n.target).is(t._element) && (t._ignoreBackdropClick = !0)
               })
            }), this._showBackdrop(function () {
               return t._showElement(n)
            })))
         }, n.hide = function (n) {
            var e = this,
               t, i, u;
            (n && n.preventDefault(), !this._isTransitioning && this._isShown) && (t = r.Event(c.HIDE), (r(this._element).trigger(t), this._isShown && !t.isDefaultPrevented()) && (this._isShown = !1, i = r(this._element).hasClass(wt), (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), r(document).off(c.FOCUSIN), r(this._element).removeClass(ir), r(this._element).off(c.CLICK_DISMISS), r(this._dialog).off(c.MOUSEDOWN_DISMISS), i) ? (u = f.getTransitionDurationFromElement(this._element), r(this._element).one(f.TRANSITION_END, function (n) {
               return e._hideModal(n)
            }).emulateTransitionEnd(u)) : this._hideModal()))
         }, n.dispose = function () {
            r.removeData(this._element, tr);
            r(window, document, this._element, this._backdrop).off(p);
            this._config = null;
            this._element = null;
            this._dialog = null;
            this._backdrop = null;
            this._isShown = null;
            this._isBodyOverflowing = null;
            this._ignoreBackdropClick = null;
            this._scrollbarWidth = null
         }, n.handleUpdate = function () {
            this._adjustDialog()
         }, n._getConfig = function (n) {
            return n = v({}, kr, n), f.typeCheckConfig(pt, n, yo), n
         }, n._showElement = function (n) {
            var t = this,
               u = r(this._element).hasClass(wt),
               e, i, o;
            this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element);
            this._element.style.display = "block";
            this._element.removeAttribute("aria-hidden");
            this._element.scrollTop = 0;
            u && f.reflow(this._element);
            r(this._element).addClass(ir);
            this._config.focus && this._enforceFocus();
            e = r.Event(c.SHOWN, {
               relatedTarget: n
            });
            i = function () {
               t._config.focus && t._element.focus();
               t._isTransitioning = !1;
               r(t._element).trigger(e)
            };
            u ? (o = f.getTransitionDurationFromElement(this._element), r(this._dialog).one(f.TRANSITION_END, i).emulateTransitionEnd(o)) : i()
         }, n._enforceFocus = function () {
            var n = this;
            r(document).off(c.FOCUSIN).on(c.FOCUSIN, function (t) {
               document !== t.target && n._element !== t.target && 0 === r(n._element).has(t.target).length && n._element.focus()
            })
         }, n._setEscapeEvent = function () {
            var n = this;
            this._isShown && this._config.keyboard ? r(this._element).on(c.KEYDOWN_DISMISS, function (t) {
               27 === t.which && (t.preventDefault(), n.hide())
            }) : this._isShown || r(this._element).off(c.KEYDOWN_DISMISS)
         }, n._setResizeEvent = function () {
            var n = this;
            this._isShown ? r(window).on(c.RESIZE, function (t) {
               return n.handleUpdate(t)
            }) : r(window).off(c.RESIZE)
         }, n._hideModal = function () {
            var n = this;
            this._element.style.display = "none";
            this._element.setAttribute("aria-hidden", !0);
            this._isTransitioning = !1;
            this._showBackdrop(function () {
               r(document.body).removeClass(pu);
               n._resetAdjustments();
               n._resetScrollbar();
               r(n._element).trigger(c.HIDDEN)
            })
         }, n._removeBackdrop = function () {
            this._backdrop && (r(this._backdrop).remove(), this._backdrop = null)
         }, n._showBackdrop = function (n) {
            var t = this,
               i = r(this._element).hasClass(wt) ? wt : "",
               e, u, o;
            if (this._isShown && this._config.backdrop) {
               if (this._backdrop = document.createElement("div"), this._backdrop.className = wo, i && this._backdrop.classList.add(i), r(this._backdrop).appendTo(document.body), r(this._element).on(c.CLICK_DISMISS, function (n) {
                     t._ignoreBackdropClick ? t._ignoreBackdropClick = !1 : n.target === n.currentTarget && ("static" === t._config.backdrop ? t._element.focus() : t.hide())
                  }), i && f.reflow(this._backdrop), r(this._backdrop).addClass(ir), !n) return;
               if (!i) return void n();
               e = f.getTransitionDurationFromElement(this._backdrop);
               r(this._backdrop).one(f.TRANSITION_END, n).emulateTransitionEnd(e)
            } else !this._isShown && this._backdrop ? (r(this._backdrop).removeClass(ir), u = function () {
               t._removeBackdrop();
               n && n()
            }, r(this._element).hasClass(wt) ? (o = f.getTransitionDurationFromElement(this._backdrop), r(this._backdrop).one(f.TRANSITION_END, u).emulateTransitionEnd(o)) : u()) : n && n()
         }, n._adjustDialog = function () {
            var n = this._element.scrollHeight > document.documentElement.clientHeight;
            !this._isBodyOverflowing && n && (this._element.style.paddingLeft = this._scrollbarWidth + "px");
            this._isBodyOverflowing && !n && (this._element.style.paddingRight = this._scrollbarWidth + "px")
         }, n._resetAdjustments = function () {
            this._element.style.paddingLeft = "";
            this._element.style.paddingRight = ""
         }, n._checkScrollbar = function () {
            var n = document.body.getBoundingClientRect();
            this._isBodyOverflowing = n.left + n.right < window.innerWidth;
            this._scrollbarWidth = this._getScrollbarWidth()
         }, n._setScrollbar = function () {
            var n = this,
               t, i, u, f;
            this._isBodyOverflowing && (t = [].slice.call(document.querySelectorAll(wu)), i = [].slice.call(document.querySelectorAll(bu)), r(t).each(function (t, i) {
               var u = i.style.paddingRight,
                  f = r(i).css("padding-right");
               r(i).data("padding-right", u).css("padding-right", parseFloat(f) + n._scrollbarWidth + "px")
            }), r(i).each(function (t, i) {
               var u = i.style.marginRight,
                  f = r(i).css("margin-right");
               r(i).data("margin-right", u).css("margin-right", parseFloat(f) - n._scrollbarWidth + "px")
            }), u = document.body.style.paddingRight, f = r(document.body).css("padding-right"), r(document.body).data("padding-right", u).css("padding-right", parseFloat(f) + this._scrollbarWidth + "px"))
         }, n._resetScrollbar = function () {
            var i = [].slice.call(document.querySelectorAll(wu)),
               n, t;
            r(i).each(function (n, t) {
               var i = r(t).data("padding-right");
               r(t).removeData("padding-right");
               t.style.paddingRight = i || ""
            });
            n = [].slice.call(document.querySelectorAll("" + bu));
            r(n).each(function (n, t) {
               var i = r(t).data("margin-right");
               "undefined" != typeof i && r(t).css("margin-right", i).removeData("margin-right")
            });
            t = r(document.body).data("padding-right");
            r(document.body).removeData("padding-right");
            document.body.style.paddingRight = t || ""
         }, n._getScrollbarWidth = function () {
            var n = document.createElement("div"),
               t;
            return n.className = po, document.body.appendChild(n), t = n.getBoundingClientRect().width - n.clientWidth, document.body.removeChild(n), t
         }, t._jQueryInterface = function (n, i) {
            return this.each(function () {
               var u = r(this).data(tr),
                  f = v({}, kr, r(this).data(), "object" == typeof n && n ? n : {});
               if (u || (u = new t(this, f), r(this).data(tr, u)), "string" == typeof n) {
                  if ("undefined" == typeof u[n]) throw new TypeError('No method named "' + n + '"');
                  u[n](i)
               } else f.show && u.show(i)
            })
         }, g(t, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return kr
            }
         }]), t
      }(), r(document).on(c.CLICK_DATA_API, ko, function (n) {
         var t, i = this,
            u = f.getSelectorFromElement(this),
            e, o;
         u && (t = document.querySelector(u));
         e = r(t).data(tr) ? "toggle" : v({}, r(t).data(), r(this).data());
         "A" !== this.tagName && "AREA" !== this.tagName || n.preventDefault();
         o = r(t).one(c.SHOW, function (n) {
            n.isDefaultPrevented() || o.one(c.HIDDEN, function () {
               r(i).is(":visible") && i.focus()
            })
         });
         fi._jQueryInterface.call(r(t), e, this)
      }), r.fn[pt] = fi._jQueryInterface, r.fn[pt].Constructor = fi, r.fn[pt].noConflict = function () {
         return r.fn[pt] = vo, fi._jQueryInterface
      }, fi),
      eu = (ot = "tooltip", b = "." + (dr = "bs.tooltip"), ns = (u = t).fn[ot], ku = "bs-tooltip", ts = new RegExp("(^|\\s)" + ku + "\\S+", "g"), us = {
         animation: !0,
         template: '<div class="tooltip" role="tooltip"><div class="arrow"><\/div><div class="tooltip-inner"><\/div><\/div>',
         trigger: "hover focus",
         title: "",
         delay: 0,
         html: !(rs = {
            AUTO: "auto",
            TOP: "top",
            RIGHT: "right",
            BOTTOM: "bottom",
            LEFT: "left"
         }),
         selector: !(is = {
            animation: "boolean",
            template: "string",
            title: "(string|element|function)",
            trigger: "string",
            delay: "(number|object)",
            html: "boolean",
            selector: "(string|boolean)",
            placement: "(string|function)",
            offset: "(number|string)",
            container: "(string|element|boolean)",
            fallbackPlacement: "(string|array)",
            boundary: "(string|element)"
         }),
         placement: "top",
         offset: 0,
         container: !1,
         fallbackPlacement: "flip",
         boundary: "scrollParent"
      }, gr = "out", fs = {
         HIDE: "hide" + b,
         HIDDEN: "hidden" + b,
         SHOW: (ei = "show") + b,
         SHOWN: "shown" + b,
         INSERTED: "inserted" + b,
         CLICK: "click" + b,
         FOCUSIN: "focusin" + b,
         FOCUSOUT: "focusout" + b,
         MOUSEENTER: "mouseenter" + b,
         MOUSELEAVE: "mouseleave" + b
      }, oi = "fade", si = "show", es = ".tooltip-inner", os = ".arrow", hi = "hover", nu = "focus", ss = "click", hs = "manual", rr = function () {
         function t(n, t) {
            if ("undefined" == typeof i) throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");
            this._isEnabled = !0;
            this._timeout = 0;
            this._hoverState = "";
            this._activeTrigger = {};
            this._popper = null;
            this.element = n;
            this.config = this._getConfig(t);
            this.tip = null;
            this._setListeners()
         }
         var n = t.prototype;
         return n.enable = function () {
            this._isEnabled = !0
         }, n.disable = function () {
            this._isEnabled = !1
         }, n.toggleEnabled = function () {
            this._isEnabled = !this._isEnabled
         }, n.toggle = function (n) {
            if (this._isEnabled)
               if (n) {
                  var i = this.constructor.DATA_KEY,
                     t = u(n.currentTarget).data(i);
                  t || (t = new this.constructor(n.currentTarget, this._getDelegateConfig()), u(n.currentTarget).data(i, t));
                  t._activeTrigger.click = !t._activeTrigger.click;
                  t._isWithActiveTrigger() ? t._enter(null, t) : t._leave(null, t)
               } else {
                  if (u(this.getTipElement()).hasClass(si)) return void this._leave(null, this);
                  this._enter(null, this)
               }
         }, n.dispose = function () {
            clearTimeout(this._timeout);
            u.removeData(this.element, this.constructor.DATA_KEY);
            u(this.element).off(this.constructor.EVENT_KEY);
            u(this.element).closest(".modal").off("hide.bs.modal");
            this.tip && u(this.tip).remove();
            this._isEnabled = null;
            this._timeout = null;
            this._hoverState = null;
            (this._activeTrigger = null) !== this._popper && this._popper.destroy();
            this._popper = null;
            this.element = null;
            this.config = null;
            this.tip = null
         }, n.show = function () {
            var n = this,
               r, h, t, e, c, o, l, s, a;
            if ("none" === u(this.element).css("display")) throw new Error("Please use show on visible elements");
            if (r = u.Event(this.constructor.Event.SHOW), this.isWithContent() && this._isEnabled) {
               if (u(this.element).trigger(r), h = u.contains(this.element.ownerDocument.documentElement, this.element), r.isDefaultPrevented() || !h) return;
               t = this.getTipElement();
               e = f.getUID(this.constructor.NAME);
               t.setAttribute("id", e);
               this.element.setAttribute("aria-describedby", e);
               this.setContent();
               this.config.animation && u(t).addClass(oi);
               c = "function" == typeof this.config.placement ? this.config.placement.call(this, t, this.element) : this.config.placement;
               o = this._getAttachment(c);
               this.addAttachmentClass(o);
               l = !1 === this.config.container ? document.body : u(document).find(this.config.container);
               u(t).data(this.constructor.DATA_KEY, this);
               u.contains(this.element.ownerDocument.documentElement, this.tip) || u(t).appendTo(l);
               u(this.element).trigger(this.constructor.Event.INSERTED);
               this._popper = new i(this.element, t, {
                  placement: o,
                  modifiers: {
                     offset: {
                        offset: this.config.offset
                     },
                     flip: {
                        behavior: this.config.fallbackPlacement
                     },
                     arrow: {
                        element: os
                     },
                     preventOverflow: {
                        boundariesElement: this.config.boundary
                     }
                  },
                  onCreate: function (t) {
                     t.originalPlacement !== t.placement && n._handlePopperPlacementChange(t)
                  },
                  onUpdate: function (t) {
                     n._handlePopperPlacementChange(t)
                  }
               });
               u(t).addClass(si);
               "ontouchstart" in document.documentElement && u(document.body).children().on("mouseover", null, u.noop);
               s = function () {
                  n.config.animation && n._fixTransition();
                  var t = n._hoverState;
                  n._hoverState = null;
                  u(n.element).trigger(n.constructor.Event.SHOWN);
                  t === gr && n._leave(null, n)
               };
               u(this.tip).hasClass(oi) ? (a = f.getTransitionDurationFromElement(this.tip), u(this.tip).one(f.TRANSITION_END, s).emulateTransitionEnd(a)) : s()
            }
         }, n.hide = function (n) {
            var t = this,
               i = this.getTipElement(),
               r = u.Event(this.constructor.Event.HIDE),
               e = function () {
                  t._hoverState !== ei && i.parentNode && i.parentNode.removeChild(i);
                  t._cleanTipClass();
                  t.element.removeAttribute("aria-describedby");
                  u(t.element).trigger(t.constructor.Event.HIDDEN);
                  null !== t._popper && t._popper.destroy();
                  n && n()
               },
               o;
            (u(this.element).trigger(r), r.isDefaultPrevented()) || ((u(i).removeClass(si), "ontouchstart" in document.documentElement && u(document.body).children().off("mouseover", null, u.noop), this._activeTrigger[ss] = !1, this._activeTrigger[nu] = !1, this._activeTrigger[hi] = !1, u(this.tip).hasClass(oi)) ? (o = f.getTransitionDurationFromElement(i), u(i).one(f.TRANSITION_END, e).emulateTransitionEnd(o)) : e(), this._hoverState = "")
         }, n.update = function () {
            null !== this._popper && this._popper.scheduleUpdate()
         }, n.isWithContent = function () {
            return Boolean(this.getTitle())
         }, n.addAttachmentClass = function (n) {
            u(this.getTipElement()).addClass(ku + "-" + n)
         }, n.getTipElement = function () {
            return this.tip = this.tip || u(this.config.template)[0], this.tip
         }, n.setContent = function () {
            var n = this.getTipElement();
            this.setElementContent(u(n.querySelectorAll(es)), this.getTitle());
            u(n).removeClass(oi + " " + si)
         }, n.setElementContent = function (n, t) {
            var i = this.config.html;
            "object" == typeof t && (t.nodeType || t.jquery) ? i ? u(t).parent().is(n) || n.empty().append(t) : n.text(u(t).text()) : n[i ? "html" : "text"](t)
         }, n.getTitle = function () {
            var n = this.element.getAttribute("data-original-title");
            return n || (n = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), n
         }, n._getAttachment = function (n) {
            return rs[n.toUpperCase()]
         }, n._setListeners = function () {
            var n = this;
            this.config.trigger.split(" ").forEach(function (t) {
               if ("click" === t) u(n.element).on(n.constructor.Event.CLICK, n.config.selector, function (t) {
                  return n.toggle(t)
               });
               else if (t !== hs) {
                  var i = t === hi ? n.constructor.Event.MOUSEENTER : n.constructor.Event.FOCUSIN,
                     r = t === hi ? n.constructor.Event.MOUSELEAVE : n.constructor.Event.FOCUSOUT;
                  u(n.element).on(i, n.config.selector, function (t) {
                     return n._enter(t)
                  }).on(r, n.config.selector, function (t) {
                     return n._leave(t)
                  })
               }
               u(n.element).closest(".modal").on("hide.bs.modal", function () {
                  return n.hide()
               })
            });
            this.config.selector ? this.config = v({}, this.config, {
               trigger: "manual",
               selector: ""
            }) : this._fixTitle()
         }, n._fixTitle = function () {
            var n = typeof this.element.getAttribute("data-original-title");
            (this.element.getAttribute("title") || "string" !== n) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
         }, n._enter = function (n, t) {
            var i = this.constructor.DATA_KEY;
            (t = t || u(n.currentTarget).data(i)) || (t = new this.constructor(n.currentTarget, this._getDelegateConfig()), u(n.currentTarget).data(i, t));
            n && (t._activeTrigger["focusin" === n.type ? nu : hi] = !0);
            u(t.getTipElement()).hasClass(si) || t._hoverState === ei ? t._hoverState = ei : (clearTimeout(t._timeout), t._hoverState = ei, t.config.delay && t.config.delay.show ? t._timeout = setTimeout(function () {
               t._hoverState === ei && t.show()
            }, t.config.delay.show) : t.show())
         }, n._leave = function (n, t) {
            var i = this.constructor.DATA_KEY;
            (t = t || u(n.currentTarget).data(i)) || (t = new this.constructor(n.currentTarget, this._getDelegateConfig()), u(n.currentTarget).data(i, t));
            n && (t._activeTrigger["focusout" === n.type ? nu : hi] = !1);
            t._isWithActiveTrigger() || (clearTimeout(t._timeout), t._hoverState = gr, t.config.delay && t.config.delay.hide ? t._timeout = setTimeout(function () {
               t._hoverState === gr && t.hide()
            }, t.config.delay.hide) : t.hide())
         }, n._isWithActiveTrigger = function () {
            for (var n in this._activeTrigger)
               if (this._activeTrigger[n]) return !0;
            return !1
         }, n._getConfig = function (n) {
            return "number" == typeof (n = v({}, this.constructor.Default, u(this.element).data(), "object" == typeof n && n ? n : {})).delay && (n.delay = {
               show: n.delay,
               hide: n.delay
            }), "number" == typeof n.title && (n.title = n.title.toString()), "number" == typeof n.content && (n.content = n.content.toString()), f.typeCheckConfig(ot, n, this.constructor.DefaultType), n
         }, n._getDelegateConfig = function () {
            var t = {},
               n;
            if (this.config)
               for (n in this.config) this.constructor.Default[n] !== this.config[n] && (t[n] = this.config[n]);
            return t
         }, n._cleanTipClass = function () {
            var t = u(this.getTipElement()),
               n = t.attr("class").match(ts);
            null !== n && n.length && t.removeClass(n.join(""))
         }, n._handlePopperPlacementChange = function (n) {
            var t = n.instance;
            this.tip = t.popper;
            this._cleanTipClass();
            this.addAttachmentClass(this._getAttachment(n.placement))
         }, n._fixTransition = function () {
            var n = this.getTipElement(),
               t = this.config.animation;
            null === n.getAttribute("x-placement") && (u(n).removeClass(oi), this.config.animation = !1, this.hide(), this.show(), this.config.animation = t)
         }, t._jQueryInterface = function (n) {
            return this.each(function () {
               var i = u(this).data(dr),
                  r = "object" == typeof n && n;
               if ((i || !/dispose|hide/.test(n)) && (i || (i = new t(this, r), u(this).data(dr, i)), "string" == typeof n)) {
                  if ("undefined" == typeof i[n]) throw new TypeError('No method named "' + n + '"');
                  i[n]()
               }
            })
         }, g(t, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return us
            }
         }, {
            key: "NAME",
            get: function () {
               return ot
            }
         }, {
            key: "DATA_KEY",
            get: function () {
               return dr
            }
         }, {
            key: "Event",
            get: function () {
               return fs
            }
         }, {
            key: "EVENT_KEY",
            get: function () {
               return b
            }
         }, {
            key: "DefaultType",
            get: function () {
               return is
            }
         }]), t
      }(), u.fn[ot] = rr._jQueryInterface, u.fn[ot].Constructor = rr, u.fn[ot].noConflict = function () {
         return u.fn[ot] = ns, rr._jQueryInterface
      }, rr),
      ic = (bt = "popover", k = "." + (tu = "bs.popover"), cs = (d = t).fn[bt], du = "bs-popover", ls = new RegExp("(^|\\s)" + du + "\\S+", "g"), as = v({}, eu.Default, {
         placement: "right",
         trigger: "click",
         content: "",
         template: '<div class="popover" role="tooltip"><div class="arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
      }), vs = v({}, eu.DefaultType, {
         content: "(string|element|function)"
      }), ys = "fade", ws = ".popover-header", bs = ".popover-body", ks = {
         HIDE: "hide" + k,
         HIDDEN: "hidden" + k,
         SHOW: (ps = "show") + k,
         SHOWN: "shown" + k,
         INSERTED: "inserted" + k,
         CLICK: "click" + k,
         FOCUSIN: "focusin" + k,
         FOCUSOUT: "focusout" + k,
         MOUSEENTER: "mouseenter" + k,
         MOUSELEAVE: "mouseleave" + k
      }, ur = function (n) {
         function i() {
            return n.apply(this, arguments) || this
         }
         var r, u, t;
         return u = n, (r = i).prototype = Object.create(u.prototype), (r.prototype.constructor = r).__proto__ = u, t = i.prototype, t.isWithContent = function () {
            return this.getTitle() || this._getContent()
         }, t.addAttachmentClass = function (n) {
            d(this.getTipElement()).addClass(du + "-" + n)
         }, t.getTipElement = function () {
            return this.tip = this.tip || d(this.config.template)[0], this.tip
         }, t.setContent = function () {
            var t = d(this.getTipElement()),
               n;
            this.setElementContent(t.find(ws), this.getTitle());
            n = this._getContent();
            "function" == typeof n && (n = n.call(this.element));
            this.setElementContent(t.find(bs), n);
            t.removeClass(ys + " " + ps)
         }, t._getContent = function () {
            return this.element.getAttribute("data-content") || this.config.content
         }, t._cleanTipClass = function () {
            var t = d(this.getTipElement()),
               n = t.attr("class").match(ls);
            null !== n && 0 < n.length && t.removeClass(n.join(""))
         }, i._jQueryInterface = function (n) {
            return this.each(function () {
               var t = d(this).data(tu),
                  r = "object" == typeof n ? n : null;
               if ((t || !/destroy|hide/.test(n)) && (t || (t = new i(this, r), d(this).data(tu, t)), "string" == typeof n)) {
                  if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
                  t[n]()
               }
            })
         }, g(i, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return as
            }
         }, {
            key: "NAME",
            get: function () {
               return bt
            }
         }, {
            key: "DATA_KEY",
            get: function () {
               return tu
            }
         }, {
            key: "Event",
            get: function () {
               return ks
            }
         }, {
            key: "EVENT_KEY",
            get: function () {
               return k
            }
         }, {
            key: "DefaultType",
            get: function () {
               return vs
            }
         }]), i
      }(eu), d.fn[bt] = ur._jQueryInterface, d.fn[bt].Constructor = ur, d.fn[bt].noConflict = function () {
         return d.fn[bt] = cs, ur._jQueryInterface
      }, ur),
      rc = (st = "scrollspy", fr = "." + (iu = "bs.scrollspy"), ds = (a = t).fn[st], gu = {
         offset: 10,
         method: "auto",
         target: ""
      }, gs = {
         offset: "number",
         method: "string",
         target: "(string|element)"
      }, ru = {
         ACTIVATE: "activate" + fr,
         SCROLL: "scroll" + fr,
         LOAD_DATA_API: "load" + fr + ".data-api"
      }, nh = "dropdown-item", kt = "active", th = '[data-spy="scroll"]', ih = ".active", nf = ".nav, .list-group", uu = ".nav-link", rh = ".nav-item", tf = ".list-group-item", uh = ".dropdown", fh = ".dropdown-item", eh = ".dropdown-toggle", oh = "offset", rf = "position", ci = function () {
         function t(n, t) {
            var i = this;
            this._element = n;
            this._scrollElement = "BODY" === n.tagName ? window : n;
            this._config = this._getConfig(t);
            this._selector = this._config.target + " " + uu + "," + this._config.target + " " + tf + "," + this._config.target + " " + fh;
            this._offsets = [];
            this._targets = [];
            this._activeTarget = null;
            this._scrollHeight = 0;
            a(this._scrollElement).on(ru.SCROLL, function (n) {
               return i._process(n)
            });
            this.refresh();
            this._process()
         }
         var n = t.prototype;
         return n.refresh = function () {
            var n = this,
               i = this._scrollElement === this._scrollElement.window ? oh : rf,
               t = "auto" === this._config.method ? i : this._config.method,
               r = t === rf ? this._getScrollTop() : 0;
            this._offsets = [];
            this._targets = [];
            this._scrollHeight = this._getScrollHeight();
            [].slice.call(document.querySelectorAll(this._selector)).map(function (n) {
               var i, u = f.getSelectorFromElement(n),
                  e;
               return (u && (i = document.querySelector(u)), i) && (e = i.getBoundingClientRect(), e.width || e.height) ? [a(i)[t]().top + r, u] : null
            }).filter(function (n) {
               return n
            }).sort(function (n, t) {
               return n[0] - t[0]
            }).forEach(function (t) {
               n._offsets.push(t[0]);
               n._targets.push(t[1])
            })
         }, n.dispose = function () {
            a.removeData(this._element, iu);
            a(this._scrollElement).off(fr);
            this._element = null;
            this._scrollElement = null;
            this._config = null;
            this._selector = null;
            this._offsets = null;
            this._targets = null;
            this._activeTarget = null;
            this._scrollHeight = null
         }, n._getConfig = function (n) {
            if ("string" != typeof (n = v({}, gu, "object" == typeof n && n ? n : {})).target) {
               var t = a(n.target).attr("id");
               t || (t = f.getUID(st), a(n.target).attr("id", t));
               n.target = "#" + t
            }
            return f.typeCheckConfig(st, n, gs), n
         }, n._getScrollTop = function () {
            return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
         }, n._getScrollHeight = function () {
            return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
         }, n._getOffsetHeight = function () {
            return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
         }, n._process = function () {
            var t = this._getScrollTop() + this._config.offset,
               r = this._getScrollHeight(),
               u = this._config.offset + r - this._getOffsetHeight(),
               i, n;
            if (this._scrollHeight !== r && this.refresh(), u <= t) i = this._targets[this._targets.length - 1], this._activeTarget !== i && this._activate(i);
            else {
               if (this._activeTarget && t < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();
               for (n = this._offsets.length; n--;) this._activeTarget !== this._targets[n] && t >= this._offsets[n] && ("undefined" == typeof this._offsets[n + 1] || t < this._offsets[n + 1]) && this._activate(this._targets[n])
            }
         }, n._activate = function (n) {
            var i, t;
            this._activeTarget = n;
            this._clear();
            i = this._selector.split(",");
            i = i.map(function (t) {
               return t + '[data-target="' + n + '"],' + t + '[href="' + n + '"]'
            });
            t = a([].slice.call(document.querySelectorAll(i.join(","))));
            t.hasClass(nh) ? (t.closest(uh).find(eh).addClass(kt), t.addClass(kt)) : (t.addClass(kt), t.parents(nf).prev(uu + ", " + tf).addClass(kt), t.parents(nf).prev(rh).children(uu).addClass(kt));
            a(this._scrollElement).trigger(ru.ACTIVATE, {
               relatedTarget: n
            })
         }, n._clear = function () {
            var n = [].slice.call(document.querySelectorAll(this._selector));
            a(n).filter(ih).removeClass(kt)
         }, t._jQueryInterface = function (n) {
            return this.each(function () {
               var i = a(this).data(iu);
               if (i || (i = new t(this, "object" == typeof n && n), a(this).data(iu, i)), "string" == typeof n) {
                  if ("undefined" == typeof i[n]) throw new TypeError('No method named "' + n + '"');
                  i[n]()
               }
            })
         }, g(t, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }, {
            key: "Default",
            get: function () {
               return gu
            }
         }]), t
      }(), a(window).on(ru.LOAD_DATA_API, function () {
         for (var i, n = [].slice.call(document.querySelectorAll(th)), t = n.length; t--;) i = a(n[t]), ci._jQueryInterface.call(i, i.data())
      }), a.fn[st] = ci._jQueryInterface, a.fn[st].Constructor = ci, a.fn[st].noConflict = function () {
         return a.fn[st] = ds, ci._jQueryInterface
      }, ci),
      uc = (li = "." + (fu = "bs.tab"), sh = (h = t).fn.tab, ai = {
         HIDE: "hide" + li,
         HIDDEN: "hidden" + li,
         SHOW: "show" + li,
         SHOWN: "shown" + li,
         CLICK_DATA_API: "click" + li + ".data-api"
      }, hh = "dropdown-menu", vi = "active", ch = "disabled", lh = "fade", uf = "show", ah = ".dropdown", vh = ".nav, .list-group", ff = ".active", ef = "> li > .active", yh = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', ph = ".dropdown-toggle", wh = "> .dropdown-menu .active", yi = function () {
         function n(n) {
            this._element = n
         }
         var t = n.prototype;
         return t.show = function () {
            var s = this,
               i, n, t, r, c, u, e, o;
            this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && h(this._element).hasClass(vi) || h(this._element).hasClass(ch) || (t = h(this._element).closest(vh)[0], r = f.getSelectorFromElement(this._element), t && (c = "UL" === t.nodeName ? ef : ff, n = (n = h.makeArray(h(t).find(c)))[n.length - 1]), u = h.Event(ai.HIDE, {
               relatedTarget: this._element
            }), e = h.Event(ai.SHOW, {
               relatedTarget: n
            }), (n && h(n).trigger(u), h(this._element).trigger(e), e.isDefaultPrevented() || u.isDefaultPrevented()) || (r && (i = document.querySelector(r)), this._activate(this._element, t), o = function () {
               var t = h.Event(ai.HIDDEN, {
                     relatedTarget: s._element
                  }),
                  i = h.Event(ai.SHOWN, {
                     relatedTarget: n
                  });
               h(n).trigger(t);
               h(s._element).trigger(i)
            }, i ? this._activate(i, i.parentNode, o) : o()))
         }, t.dispose = function () {
            h.removeData(this._element, fu);
            this._element = null
         }, t._activate = function (n, t, i) {
            var o = this,
               r = ("UL" === t.nodeName ? h(t).find(ef) : h(t).children(ff))[0],
               s = i && r && h(r).hasClass(lh),
               u = function () {
                  return o._transitionComplete(n, r, i)
               },
               e;
            r && s ? (e = f.getTransitionDurationFromElement(r), h(r).one(f.TRANSITION_END, u).emulateTransitionEnd(e)) : u()
         }, t._transitionComplete = function (n, t, i) {
            var r, u, e;
            t && (h(t).removeClass(uf + " " + vi), r = h(t.parentNode).find(wh)[0], r && h(r).removeClass(vi), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !1));
            (h(n).addClass(vi), "tab" === n.getAttribute("role") && n.setAttribute("aria-selected", !0), f.reflow(n), h(n).addClass(uf), n.parentNode && h(n.parentNode).hasClass(hh)) && (u = h(n).closest(ah)[0], u && (e = [].slice.call(u.querySelectorAll(ph)), h(e).addClass(vi)), n.setAttribute("aria-expanded", !0));
            i && i()
         }, n._jQueryInterface = function (t) {
            return this.each(function () {
               var r = h(this),
                  i = r.data(fu);
               if (i || (i = new n(this), r.data(fu, i)), "string" == typeof t) {
                  if ("undefined" == typeof i[t]) throw new TypeError('No method named "' + t + '"');
                  i[t]()
               }
            })
         }, g(n, null, [{
            key: "VERSION",
            get: function () {
               return "4.1.3"
            }
         }]), n
      }(), h(document).on(ai.CLICK_DATA_API, yh, function (n) {
         n.preventDefault();
         yi._jQueryInterface.call(h(this), "show")
      }), h.fn.tab = yi._jQueryInterface, h.fn.tab.Constructor = yi, h.fn.tab.noConflict = function () {
         return h.fn.tab = sh, yi._jQueryInterface
      }, yi);
   ! function (n) {
      if ("undefined" == typeof n) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
      var t = n.fn.jquery.split(" ")[0].split(".");
      if (t[0] < 2 && t[1] < 9 || 1 === t[0] && 9 === t[1] && t[2] < 1 || 4 <= t[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
   }(t);
   n.Util = f;
   n.Alert = bh;
   n.Button = kh;
   n.Carousel = dh;
   n.Collapse = gh;
   n.Dropdown = nc;
   n.Modal = tc;
   n.Popover = ic;
   n.Scrollspy = rc;
   n.Tab = uc;
   n.Tooltip = eu;
   Object.defineProperty(n, "__esModule", {
      value: !0
   })
});
! function (n) {
   function i() {}

   function t(n) {
      function u(t) {
         t.prototype.option || (t.prototype.option = function (t) {
            n.isPlainObject(t) && (this.options = n.extend(!0, this.options, t))
         })
      }

      function f(i, u) {
         n.fn[i] = function (f) {
            var h, e, s;
            if ("string" == typeof f) {
               for (var c = r.call(arguments, 1), o = 0, l = this.length; l > o; o++)
                  if (h = this[o], e = n.data(h, i), e)
                     if (n.isFunction(e[f]) && "_" !== f.charAt(0)) {
                        if (s = e[f].apply(e, c), void 0 !== s) return s
                     } else t("no such method '" + f + "' for " + i + " instance");
               else t("cannot call methods on " + i + " prior to initialization; attempted to call '" + f + "'");
               return this
            }
            return this.each(function () {
               var t = n.data(this, i);
               t ? (t.option(f), t._init()) : (t = new u(this, f), n.data(this, i, t))
            })
         }
      }
      if (n) {
         var t = "undefined" == typeof console ? i : function (n) {
            console.error(n)
         };
         return n.bridget = function (n, t) {
            u(t);
            f(n, t)
         }, n.bridget
      }
   }
   var r = Array.prototype.slice;
   "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], t) : t("object" == typeof exports ? require("jquery") : n.jQuery)
}(window),
function (n) {
   function f(t) {
      var i = n.event;
      return i.target = i.target || i.srcElement || t, i
   }
   var t = document.documentElement,
      u = function () {},
      i, r;
   t.addEventListener ? u = function (n, t, i) {
      n.addEventListener(t, i, !1)
   } : t.attachEvent && (u = function (n, t, i) {
      n[t + i] = i.handleEvent ? function () {
         var t = f(n);
         i.handleEvent.call(i, t)
      } : function () {
         var t = f(n);
         i.call(n, t)
      };
      n.attachEvent("on" + t, n[t + i])
   });
   i = function () {};
   t.removeEventListener ? i = function (n, t, i) {
      n.removeEventListener(t, i, !1)
   } : t.detachEvent && (i = function (n, t, i) {
      n.detachEvent("on" + t, n[t + i]);
      try {
         delete n[t + i]
      } catch (r) {
         n[t + i] = void 0
      }
   });
   r = {
      bind: u,
      unbind: i
   };
   "function" == typeof define && define.amd ? define("eventie/eventie", r) : "object" == typeof exports ? module.exports = r : n.eventie = r
}(this),
function (n) {
   function t(n) {
      "function" == typeof n && (t.isReady ? n() : f.push(n))
   }

   function r(n) {
      var r = "readystatechange" === n.type && "complete" !== i.readyState;
      t.isReady || r || e()
   }

   function e() {
      var n, i, r;
      for (t.isReady = !0, n = 0, i = f.length; i > n; n++) r = f[n], r()
   }

   function u(u) {
      return "complete" === i.readyState ? e() : (u.bind(i, "DOMContentLoaded", r), u.bind(i, "readystatechange", r), u.bind(n, "load", r)), t
   }
   var i = n.document,
      f = [];
   t.isReady = !1;
   "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], u) : "object" == typeof exports ? module.exports = u(require("eventie")) : n.docReady = u(n.eventie)
}(window),
function () {
   function t() {}

   function u(n, t) {
      for (var i = n.length; i--;)
         if (n[i].listener === t) return i;
      return -1
   }

   function i(n) {
      return function () {
         return this[n].apply(this, arguments)
      }
   }
   var n = t.prototype,
      r = this,
      f = r.EventEmitter;
   n.getListeners = function (n) {
      var r, t, i = this._getEvents();
      if (n instanceof RegExp) {
         r = {};
         for (t in i) i.hasOwnProperty(t) && n.test(t) && (r[t] = i[t])
      } else r = i[n] || (i[n] = []);
      return r
   };
   n.flattenListeners = function (n) {
      for (var i = [], t = 0; t < n.length; t += 1) i.push(n[t].listener);
      return i
   };
   n.getListenersAsObject = function (n) {
      var t, i = this.getListeners(n);
      return i instanceof Array && (t = {}, t[n] = i), t || i
   };
   n.addListener = function (n, t) {
      var i, r = this.getListenersAsObject(n),
         f = "object" == typeof t;
      for (i in r) r.hasOwnProperty(i) && -1 === u(r[i], t) && r[i].push(f ? t : {
         listener: t,
         once: !1
      });
      return this
   };
   n.on = i("addListener");
   n.addOnceListener = function (n, t) {
      return this.addListener(n, {
         listener: t,
         once: !0
      })
   };
   n.once = i("addOnceListener");
   n.defineEvent = function (n) {
      return this.getListeners(n), this
   };
   n.defineEvents = function (n) {
      for (var t = 0; t < n.length; t += 1) this.defineEvent(n[t]);
      return this
   };
   n.removeListener = function (n, t) {
      var f, i, r = this.getListenersAsObject(n);
      for (i in r) r.hasOwnProperty(i) && (f = u(r[i], t), -1 !== f && r[i].splice(f, 1));
      return this
   };
   n.off = i("removeListener");
   n.addListeners = function (n, t) {
      return this.manipulateListeners(!1, n, t)
   };
   n.removeListeners = function (n, t) {
      return this.manipulateListeners(!0, n, t)
   };
   n.manipulateListeners = function (n, t, i) {
      var r, u, f = n ? this.removeListener : this.addListener,
         e = n ? this.removeListeners : this.addListeners;
      if ("object" != typeof t || t instanceof RegExp)
         for (r = i.length; r--;) f.call(this, t, i[r]);
      else
         for (r in t) t.hasOwnProperty(r) && (u = t[r]) && ("function" == typeof u ? f.call(this, r, u) : e.call(this, r, u));
      return this
   };
   n.removeEvent = function (n) {
      var t, r = typeof n,
         i = this._getEvents();
      if ("string" === r) delete i[n];
      else if (n instanceof RegExp)
         for (t in i) i.hasOwnProperty(t) && n.test(t) && delete i[t];
      else delete this._events;
      return this
   };
   n.removeAllListeners = i("removeEvent");
   n.emitEvent = function (n, t) {
      var i, f, r, e, u = this.getListenersAsObject(n);
      for (r in u)
         if (u.hasOwnProperty(r))
            for (f = u[r].length; f--;) i = u[r][f], i.once === !0 && this.removeListener(n, i.listener), e = i.listener.apply(this, t || []), e === this._getOnceReturnValue() && this.removeListener(n, i.listener);
      return this
   };
   n.trigger = i("emitEvent");
   n.emit = function (n) {
      var t = Array.prototype.slice.call(arguments, 1);
      return this.emitEvent(n, t)
   };
   n.setOnceReturnValue = function (n) {
      return this._onceReturnValue = n, this
   };
   n._getOnceReturnValue = function () {
      return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
   };
   n._getEvents = function () {
      return this._events || (this._events = {})
   };
   t.noConflict = function () {
      return r.EventEmitter = f, t
   };
   "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
      return t
   }) : "object" == typeof module && module.exports ? module.exports = t : r.EventEmitter = t
}.call(this),
   function (n) {
      function t(n) {
         if (n) {
            if ("string" == typeof r[n]) return n;
            n = n.charAt(0).toUpperCase() + n.slice(1);
            for (var t, u = 0, f = i.length; f > u; u++)
               if (t = i[u] + n, "string" == typeof r[t]) return t
         }
      }
      var i = "Webkit Moz ms Ms O".split(" "),
         r = document.documentElement.style;
      "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function () {
         return t
      }) : "object" == typeof exports ? module.exports = t : n.getStyleProperty = t
   }(window),
   function (n) {
      function i(n) {
         var t = parseFloat(n),
            i = -1 === n.indexOf("%") && !isNaN(t);
         return i && t
      }

      function u() {}

      function f() {
         for (var r, i = {
               width: 0,
               height: 0,
               innerWidth: 0,
               innerHeight: 0,
               outerWidth: 0,
               outerHeight: 0
            }, n = 0, u = t.length; u > n; n++) r = t[n], i[r] = 0;
         return i
      }

      function r(r) {
         function c() {
            var f, t, c, l;
            h || (h = !0, f = n.getComputedStyle, (o = function () {
               var n = f ? function (n) {
                  return f(n, null)
               } : function (n) {
                  return n.currentStyle
               };
               return function (t) {
                  var i = n(t);
                  return i || e("Style returned " + i + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), i
               }
            }(), u = r("boxSizing")) && (t = document.createElement("div"), t.style.width = "200px", t.style.padding = "1px 2px 3px 4px", t.style.borderStyle = "solid", t.style.borderWidth = "1px 2px 3px 4px", t.style[u] = "border-box", c = document.body || document.documentElement, c.appendChild(t), l = o(t), s = 200 === i(l.width), c.removeChild(t)))
         }

         function l(n) {
            var e, r, v, h, y, p;
            if (c(), "string" == typeof n && (n = document.querySelector(n)), n && "object" == typeof n && n.nodeType) {
               if (e = o(n), "none" === e.display) return f();
               r = {};
               r.width = n.offsetWidth;
               r.height = n.offsetHeight;
               for (var tt = r.isBorderBox = !(!u || !e[u] || "border-box" !== e[u]), l = 0, it = t.length; it > l; l++) v = t[l], h = e[v], h = a(n, h), y = parseFloat(h), r[v] = isNaN(y) ? 0 : y;
               var w = r.paddingLeft + r.paddingRight,
                  b = r.paddingTop + r.paddingBottom,
                  rt = r.marginLeft + r.marginRight,
                  ut = r.marginTop + r.marginBottom,
                  k = r.borderLeftWidth + r.borderRightWidth,
                  d = r.borderTopWidth + r.borderBottomWidth,
                  g = tt && s,
                  nt = i(e.width);
               return nt !== !1 && (r.width = nt + (g ? 0 : w + k)), p = i(e.height), p !== !1 && (r.height = p + (g ? 0 : b + d)), r.innerWidth = r.width - (w + k), r.innerHeight = r.height - (b + d), r.outerWidth = r.width + rt, r.outerHeight = r.height + ut, r
            }
         }

         function a(t, i) {
            if (n.getComputedStyle || -1 === i.indexOf("%")) return i;
            var r = t.style,
               e = r.left,
               u = t.runtimeStyle,
               f = u && u.left;
            return f && (u.left = t.currentStyle.left), r.left = i, i = r.pixelLeft, r.left = e, f && (u.left = f), i
         }
         var o, u, s, h = !1;
         return l
      }
      var e = "undefined" == typeof console ? u : function (n) {
            console.error(n)
         },
         t = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
      "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], r) : "object" == typeof exports ? module.exports = r(require("desandro-get-style-property")) : n.getSize = r(n.getStyleProperty)
   }(window),
   function (n) {
      function i(n, t) {
         return n[u](t)
      }

      function r(n) {
         if (!n.parentNode) {
            var t = document.createDocumentFragment();
            t.appendChild(n)
         }
      }

      function o(n, t) {
         r(n);
         for (var u = n.parentNode.querySelectorAll(t), i = 0, f = u.length; f > i; i++)
            if (u[i] === n) return !0;
         return !1
      }

      function s(n, t) {
         return r(n), i(n, t)
      }
      var t, u = function () {
            var u, i;
            if (n.matchesSelector) return "matchesSelector";
            for (var r = ["webkit", "moz", "ms", "o"], t = 0, f = r.length; f > t; t++)
               if (u = r[t], i = u + "MatchesSelector", n[i]) return i
         }(),
         f, e;
      u ? (f = document.createElement("div"), e = i(f, "div"), t = e ? i : s) : t = o;
      "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function () {
         return t
      }) : "object" == typeof exports ? module.exports = t : window.matchesSelector = t
   }(Element.prototype),
   function (n) {
      function r(n, t) {
         for (var i in t) n[i] = t[i];
         return n
      }

      function u(n) {
         for (var t in n) return !1;
         return t = null, !0
      }

      function f(n) {
         return n.replace(/([A-Z])/g, function (n) {
            return "-" + n.toLowerCase()
         })
      }

      function t(n, t, i) {
         function o(n, t) {
            n && (this.element = n, this.layout = t, this.position = {
               x: 0,
               y: 0
            }, this._create())
         }
         var s = i("transition"),
            h = i("transform"),
            w = s && h,
            b = !!i("perspective"),
            c = {
               WebkitTransition: "webkitTransitionEnd",
               MozTransition: "transitionend",
               OTransition: "otransitionend",
               transition: "transitionend"
            } [s],
            l = ["transform", "transition", "transitionDuration", "transitionProperty"],
            k = function () {
               for (var n, t, u = {}, r = 0, f = l.length; f > r; r++) n = l[r], t = i(n), t && t !== n && (u[n] = t);
               return u
            }(),
            a, v, y, p;
         return r(o.prototype, n.prototype), o.prototype._create = function () {
            this._transn = {
               ingProperties: {},
               clean: {},
               onEnd: {}
            };
            this.css({
               position: "absolute"
            })
         }, o.prototype.handleEvent = function (n) {
            var t = "on" + n.type;
            this[t] && this[t](n)
         }, o.prototype.getSize = function () {
            this.size = t(this.element)
         }, o.prototype.css = function (n) {
            var r = this.element.style,
               t, i;
            for (t in n) i = k[t] || t, r[i] = n[t]
         }, o.prototype.getPosition = function () {
            var r = e(this.element),
               u = this.layout.options,
               f = u.isOriginLeft,
               o = u.isOriginTop,
               n = parseInt(r[f ? "left" : "right"], 10),
               t = parseInt(r[o ? "top" : "bottom"], 10),
               i;
            n = isNaN(n) ? 0 : n;
            t = isNaN(t) ? 0 : t;
            i = this.layout.size;
            n -= f ? i.paddingLeft : i.paddingRight;
            t -= o ? i.paddingTop : i.paddingBottom;
            this.position.x = n;
            this.position.y = t
         }, o.prototype.layoutPosition = function () {
            var t = this.layout.size,
               i = this.layout.options,
               n = {};
            i.isOriginLeft ? (n.left = this.position.x + t.paddingLeft + "px", n.right = "") : (n.right = this.position.x + t.paddingRight + "px", n.left = "");
            i.isOriginTop ? (n.top = this.position.y + t.paddingTop + "px", n.bottom = "") : (n.bottom = this.position.y + t.paddingBottom + "px", n.top = "");
            this.css(n);
            this.emitEvent("layout", [this])
         }, a = b ? function (n, t) {
            return "translate3d(" + n + "px, " + t + "px, 0)"
         } : function (n, t) {
            return "translate(" + n + "px, " + t + "px)"
         }, o.prototype._transitionTo = function (n, t) {
            this.getPosition();
            var e = this.position.x,
               o = this.position.y,
               s = parseInt(n, 10),
               h = parseInt(t, 10),
               c = s === this.position.x && h === this.position.y;
            if (this.setPosition(n, t), c && !this.isTransitioning) return void this.layoutPosition();
            var i = n - e,
               r = t - o,
               u = {},
               f = this.layout.options;
            i = f.isOriginLeft ? i : -i;
            r = f.isOriginTop ? r : -r;
            u.transform = a(i, r);
            this.transition({
               to: u,
               onTransitionEnd: {
                  transform: this.layoutPosition
               },
               isCleaning: !0
            })
         }, o.prototype.goTo = function (n, t) {
            this.setPosition(n, t);
            this.layoutPosition()
         }, o.prototype.moveTo = w ? o.prototype._transitionTo : o.prototype.goTo, o.prototype.setPosition = function (n, t) {
            this.position.x = parseInt(n, 10);
            this.position.y = parseInt(t, 10)
         }, o.prototype._nonTransition = function (n) {
            this.css(n.to);
            n.isCleaning && this._removeStyles(n.to);
            for (var t in n.onTransitionEnd) n.onTransitionEnd[t].call(this)
         }, o.prototype._transition = function (n) {
            var i, t, r;
            if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(n);
            i = this._transn;
            for (t in n.onTransitionEnd) i.onEnd[t] = n.onTransitionEnd[t];
            for (t in n.to) i.ingProperties[t] = !0, n.isCleaning && (i.clean[t] = !0);
            n.from && (this.css(n.from), r = this.element.offsetHeight, r = null);
            this.enableTransition(n.to);
            this.css(n.to);
            this.isTransitioning = !0
         }, v = h && f(h) + ",opacity", o.prototype.enableTransition = function () {
            this.isTransitioning || (this.css({
               transitionProperty: v,
               transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(c, this, !1))
         }, o.prototype.transition = o.prototype[s ? "_transition" : "_nonTransition"], o.prototype.onwebkitTransitionEnd = function (n) {
            this.ontransitionend(n)
         }, o.prototype.onotransitionend = function (n) {
            this.ontransitionend(n)
         }, y = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
         }, o.prototype.ontransitionend = function (n) {
            var t, i, r;
            n.target === this.element && (t = this._transn, i = y[n.propertyName] || n.propertyName, (delete t.ingProperties[i], u(t.ingProperties) && this.disableTransition(), i in t.clean && (this.element.style[n.propertyName] = "", delete t.clean[i]), i in t.onEnd) && (r = t.onEnd[i], r.call(this), delete t.onEnd[i]), this.emitEvent("transitionEnd", [this]))
         }, o.prototype.disableTransition = function () {
            this.removeTransitionStyles();
            this.element.removeEventListener(c, this, !1);
            this.isTransitioning = !1
         }, o.prototype._removeStyles = function (n) {
            var t = {};
            for (var i in n) t[i] = "";
            this.css(t)
         }, p = {
            transitionProperty: "",
            transitionDuration: ""
         }, o.prototype.removeTransitionStyles = function () {
            this.css(p)
         }, o.prototype.removeElem = function () {
            this.element.parentNode.removeChild(this.element);
            this.emitEvent("remove", [this])
         }, o.prototype.remove = function () {
            if (!s || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
            var n = this;
            this.on("transitionEnd", function () {
               return n.removeElem(), !0
            });
            this.hide()
         }, o.prototype.reveal = function () {
            delete this.isHidden;
            this.css({
               display: ""
            });
            var n = this.layout.options;
            this.transition({
               from: n.hiddenStyle,
               to: n.visibleStyle,
               isCleaning: !0
            })
         }, o.prototype.hide = function () {
            this.isHidden = !0;
            this.css({
               display: ""
            });
            var n = this.layout.options;
            this.transition({
               from: n.visibleStyle,
               to: n.hiddenStyle,
               isCleaning: !0,
               onTransitionEnd: {
                  opacity: function () {
                     this.isHidden && this.css({
                        display: "none"
                     })
                  }
               }
            })
         }, o.prototype.destroy = function () {
            this.css({
               position: "",
               left: "",
               right: "",
               top: "",
               bottom: "",
               transition: "",
               transform: ""
            })
         }, o
      }
      var i = n.getComputedStyle,
         e = i ? function (n) {
            return i(n, null)
         } : function (n) {
            return n.currentStyle
         };
      "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property"], t) : "object" == typeof exports ? module.exports = t(require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property")) : (n.Outlayer = {}, n.Outlayer.Item = t(n.EventEmitter, n.getSize, n.getStyleProperty))
   }(window),
   function (n) {
      function t(n, t) {
         for (var i in t) n[i] = t[i];
         return n
      }

      function c(n) {
         return "[object Array]" === a.call(n)
      }

      function u(n) {
         var t = [],
            i, r;
         if (c(n)) t = n;
         else if (n && "number" == typeof n.length)
            for (i = 0, r = n.length; r > i; i++) t.push(n[i]);
         else t.push(n);
         return t
      }

      function o(n, t) {
         var i = v(t, n); - 1 !== i && t.splice(i, 1)
      }

      function l(n) {
         return n.replace(/(.)([A-Z])/g, function (n, t, i) {
            return t + "-" + i
         }).toLowerCase()
      }

      function f(f, c, a, v, y, p) {
         function w(n, i) {
            if ("string" == typeof n && (n = s.querySelector(n)), !n || !e(n)) return void(r && r.error("Bad " + this.constructor.namespace + " element: " + n));
            this.element = n;
            this.options = t({}, this.constructor.defaults);
            this.option(i);
            var u = ++k;
            this.element.outlayerGUID = u;
            b[u] = this;
            this._create();
            this.options.isInitLayout && this.layout()
         }
         var k = 0,
            b = {};
         return w.namespace = "outlayer", w.Item = p, w.defaults = {
            containerStyle: {
               position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
               opacity: 0,
               transform: "scale(0.001)"
            },
            visibleStyle: {
               opacity: 1,
               transform: "scale(1)"
            }
         }, t(w.prototype, a.prototype), w.prototype.option = function (n) {
            t(this.options, n)
         }, w.prototype._create = function () {
            this.reloadItems();
            this.stamps = [];
            this.stamp(this.options.stamp);
            t(this.element.style, this.options.containerStyle);
            this.options.isResizeBound && this.bindResize()
         }, w.prototype.reloadItems = function () {
            this.items = this._itemize(this.element.children)
         }, w.prototype._itemize = function (n) {
            for (var u, f, i = this._filterFindItemElements(n), e = this.constructor.Item, r = [], t = 0, o = i.length; o > t; t++) u = i[t], f = new e(u, this), r.push(f);
            return r
         }, w.prototype._filterFindItemElements = function (n) {
            var t;
            n = u(n);
            for (var r = this.options.itemSelector, i = [], f = 0, h = n.length; h > f; f++)
               if (t = n[f], e(t))
                  if (r) {
                     y(t, r) && i.push(t);
                     for (var s = t.querySelectorAll(r), o = 0, c = s.length; c > o; o++) i.push(s[o])
                  } else i.push(t);
            return i
         }, w.prototype.getItemElements = function () {
            for (var t = [], n = 0, i = this.items.length; i > n; n++) t.push(this.items[n].element);
            return t
         }, w.prototype.layout = function () {
            this._resetLayout();
            this._manageStamps();
            var n = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, n);
            this._isLayoutInited = !0
         }, w.prototype._init = w.prototype.layout, w.prototype._resetLayout = function () {
            this.getSize()
         }, w.prototype.getSize = function () {
            this.size = v(this.element)
         }, w.prototype._getMeasurement = function (n, t) {
            var r, i = this.options[n];
            i ? ("string" == typeof i ? r = this.element.querySelector(i) : e(i) && (r = i), this[n] = r ? v(r)[t] : i) : this[n] = 0
         }, w.prototype.layoutItems = function (n, t) {
            n = this._getItemsForLayout(n);
            this._layoutItems(n, t);
            this._postLayout()
         }, w.prototype._getItemsForLayout = function (n) {
            for (var i, r = [], t = 0, u = n.length; u > t; t++) i = n[t], i.isIgnored || r.push(i);
            return r
         }, w.prototype._layoutItems = function (n, t) {
            function f() {
               e.emitEvent("layoutComplete", [e, n])
            }
            var e = this,
               i, r;
            if (!n || !n.length) return void f();
            this._itemsOn(n, "layout", f);
            for (var o = [], u = 0, s = n.length; s > u; u++) i = n[u], r = this._getItemLayoutPosition(i), r.item = i, r.isInstant = t || i.isLayoutInstant, o.push(r);
            this._processLayoutQueue(o)
         }, w.prototype._getItemLayoutPosition = function () {
            return {
               x: 0,
               y: 0
            }
         }, w.prototype._processLayoutQueue = function (n) {
            for (var t, i = 0, r = n.length; r > i; i++) t = n[i], this._positionItem(t.item, t.x, t.y, t.isInstant)
         }, w.prototype._positionItem = function (n, t, i, r) {
            r ? n.goTo(t, i) : n.moveTo(t, i)
         }, w.prototype._postLayout = function () {
            this.resizeContainer()
         }, w.prototype.resizeContainer = function () {
            if (this.options.isResizingContainer) {
               var n = this._getContainerSize();
               n && (this._setContainerMeasure(n.width, !0), this._setContainerMeasure(n.height, !1))
            }
         }, w.prototype._getContainerSize = h, w.prototype._setContainerMeasure = function (n, t) {
            if (void 0 !== n) {
               var i = this.size;
               i.isBorderBox && (n += t ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth);
               n = Math.max(n, 0);
               this.element.style[t ? "width" : "height"] = n + "px"
            }
         }, w.prototype._itemsOn = function (n, t, i) {
            function e() {
               return u++, u === o && i.call(s), !0
            }
            for (var f, u = 0, o = n.length, s = this, r = 0, h = n.length; h > r; r++) {
               f = n[r];
               f.on(t, e)
            }
         }, w.prototype.ignore = function (n) {
            var t = this.getItem(n);
            t && (t.isIgnored = !0)
         }, w.prototype.unignore = function (n) {
            var t = this.getItem(n);
            t && delete t.isIgnored
         }, w.prototype.stamp = function (n) {
            var t, i, r;
            if (n = this._find(n))
               for (this.stamps = this.stamps.concat(n), t = 0, i = n.length; i > t; t++) r = n[t], this.ignore(r)
         }, w.prototype.unstamp = function (n) {
            var t, r, i;
            if (n = this._find(n))
               for (t = 0, r = n.length; r > t; t++) i = n[t], o(i, this.stamps), this.unignore(i)
         }, w.prototype._find = function (n) {
            if (n) return ("string" == typeof n && (n = this.element.querySelectorAll(n)), n = u(n))
         }, w.prototype._manageStamps = function () {
            var n, t, i;
            if (this.stamps && this.stamps.length)
               for (this._getBoundingRect(), n = 0, t = this.stamps.length; t > n; n++) i = this.stamps[n], this._manageStamp(i)
         }, w.prototype._getBoundingRect = function () {
            var t = this.element.getBoundingClientRect(),
               n = this.size;
            this._boundingRect = {
               left: t.left + n.paddingLeft + n.borderLeftWidth,
               top: t.top + n.paddingTop + n.borderTopWidth,
               right: t.right - (n.paddingRight + n.borderRightWidth),
               bottom: t.bottom - (n.paddingBottom + n.borderBottomWidth)
            }
         }, w.prototype._manageStamp = h, w.prototype._getElementOffset = function (n) {
            var t = n.getBoundingClientRect(),
               i = this._boundingRect,
               r = v(n);
            return {
               left: t.left - i.left - r.marginLeft,
               top: t.top - i.top - r.marginTop,
               right: i.right - t.right - r.marginRight,
               bottom: i.bottom - t.bottom - r.marginBottom
            }
         }, w.prototype.handleEvent = function (n) {
            var t = "on" + n.type;
            this[t] && this[t](n)
         }, w.prototype.bindResize = function () {
            this.isResizeBound || (f.bind(n, "resize", this), this.isResizeBound = !0)
         }, w.prototype.unbindResize = function () {
            this.isResizeBound && f.unbind(n, "resize", this);
            this.isResizeBound = !1
         }, w.prototype.onresize = function () {
            function t() {
               n.resize();
               delete n.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var n = this;
            this.resizeTimeout = setTimeout(t, 100)
         }, w.prototype.resize = function () {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
         }, w.prototype.needsResizeLayout = function () {
            var n = v(this.element),
               t = this.size && n;
            return t && n.innerWidth !== this.size.innerWidth
         }, w.prototype.addItems = function (n) {
            var t = this._itemize(n);
            return t.length && (this.items = this.items.concat(t)), t
         }, w.prototype.appended = function (n) {
            var t = this.addItems(n);
            t.length && (this.layoutItems(t, !0), this.reveal(t))
         }, w.prototype.prepended = function (n) {
            var t = this._itemize(n),
               i;
            t.length && (i = this.items.slice(0), this.items = t.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(t, !0), this.reveal(t), this.layoutItems(i))
         }, w.prototype.reveal = function (n) {
            var i = n && n.length,
               t, r;
            if (i)
               for (t = 0; i > t; t++) r = n[t], r.reveal()
         }, w.prototype.hide = function (n) {
            var i = n && n.length,
               t, r;
            if (i)
               for (t = 0; i > t; t++) r = n[t], r.hide()
         }, w.prototype.getItem = function (n) {
            for (var i, t = 0, r = this.items.length; r > t; t++)
               if (i = this.items[t], i.element === n) return i
         }, w.prototype.getItems = function (n) {
            var u, i;
            if (n && n.length) {
               for (var r = [], t = 0, f = n.length; f > t; t++) u = n[t], i = this.getItem(u), i && r.push(i);
               return r
            }
         }, w.prototype.remove = function (n) {
            var t, i, f, r;
            if (n = u(n), t = this.getItems(n), t && t.length)
               for (this._itemsOn(t, "remove", function () {
                     this.emitEvent("removeComplete", [this, t])
                  }), i = 0, f = t.length; f > i; i++) r = t[i], r.remove(), o(r, this.items)
         }, w.prototype.destroy = function () {
            var t = this.element.style,
               n, r, u, f;
            for (t.height = "", t.position = "", t.width = "", n = 0, r = this.items.length; r > n; n++) u = this.items[n], u.destroy();
            this.unbindResize();
            f = this.element.outlayerGUID;
            delete b[f];
            delete this.element.outlayerGUID;
            i && i.removeData(this.element, this.constructor.namespace)
         }, w.data = function (n) {
            var t = n && n.outlayerGUID;
            return t && b[t]
         }, w.create = function (n, u) {
            function f() {
               w.apply(this, arguments)
            }
            return Object.create ? f.prototype = Object.create(w.prototype) : t(f.prototype, w.prototype), f.prototype.constructor = f, f.defaults = t({}, w.defaults), t(f.defaults, u), f.prototype.settings = {}, f.namespace = n, f.data = w.data, f.Item = function () {
               p.apply(this, arguments)
            }, f.Item.prototype = new p, c(function () {
               for (var a, t, e, v, o = l(n), h = s.querySelectorAll(".js-" + o), c = "data-" + o + "-options", u = 0, y = h.length; y > u; u++) {
                  t = h[u];
                  e = t.getAttribute(c);
                  try {
                     a = e && JSON.parse(e)
                  } catch (p) {
                     r && r.error("Error parsing " + c + " on " + t.nodeName.toLowerCase() + (t.id ? "#" + t.id : "") + ": " + p);
                     continue
                  }
                  v = new f(t, a);
                  i && i.data(t, n, v)
               }
            }), i && i.bridget && i.bridget(n, f), f
         }, w.Item = p, w
      }
      var s = n.document,
         r = n.console,
         i = n.jQuery,
         h = function () {},
         a = Object.prototype.toString,
         e = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function (n) {
            return n instanceof HTMLElement
         } : function (n) {
            return n && "object" == typeof n && 1 === n.nodeType && "string" == typeof n.nodeName
         },
         v = Array.prototype.indexOf ? function (n, t) {
            return n.indexOf(t)
         } : function (n, t) {
            for (var i = 0, r = n.length; r > i; i++)
               if (n[i] === t) return i;
            return -1
         };
      "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "doc-ready/doc-ready", "eventEmitter/EventEmitter", "get-size/get-size", "matches-selector/matches-selector", "./item"], f) : "object" == typeof exports ? module.exports = f(require("eventie"), require("doc-ready"), require("wolfy87-eventemitter"), require("get-size"), require("desandro-matches-selector"), require("./item")) : n.Outlayer = f(n.eventie, n.docReady, n.EventEmitter, n.getSize, n.matchesSelector, n.Outlayer.Item)
   }(window),
   function (n) {
      function t(n, t) {
         var r = n.create("masonry");
         return r.prototype._resetLayout = function () {
            this.getSize();
            this._getMeasurement("columnWidth", "outerWidth");
            this._getMeasurement("gutter", "outerWidth");
            this.measureColumns();
            var n = this.cols;
            for (this.colYs = []; n--;) this.colYs.push(0);
            this.maxY = 0
         }, r.prototype.measureColumns = function () {
            if (this.getContainerWidth(), !this.columnWidth) {
               var n = this.items[0],
                  i = n && n.element;
               this.columnWidth = i && t(i).outerWidth || this.containerWidth
            }
            this.columnWidth += this.gutter;
            this.cols = Math.floor((this.containerWidth + this.gutter) / this.columnWidth);
            this.cols = Math.max(this.cols, 1)
         }, r.prototype.getContainerWidth = function () {
            var i = this.options.isFitWidth ? this.element.parentNode : this.element,
               n = t(i);
            this.containerWidth = n && n.innerWidth
         }, r.prototype._getItemLayoutPosition = function (n) {
            n.getSize();
            var e = n.size.outerWidth % this.columnWidth,
               s = e && 1 > e ? "round" : "ceil",
               t = Math[s](n.size.outerWidth / this.columnWidth);
            t = Math.min(t, this.cols);
            for (var r = this._getColGroup(t), u = Math.min.apply(Math, r), o = i(r, u), h = {
                  x: this.columnWidth * o,
                  y: u
               }, c = u + n.size.outerHeight, l = this.cols + 1 - r.length, f = 0; l > f; f++) this.colYs[o + f] = c;
            return h
         }, r.prototype._getColGroup = function (n) {
            var r;
            if (2 > n) return this.colYs;
            for (var i = [], u = this.cols + 1 - n, t = 0; u > t; t++) r = this.colYs.slice(t, t + n), i[t] = Math.max.apply(Math, r);
            return i
         }, r.prototype._manageStamp = function (n) {
            var e = t(n),
               u = this._getElementOffset(n),
               o = this.options.isOriginLeft ? u.left : u.right,
               s = o + e.outerWidth,
               f = Math.floor(o / this.columnWidth),
               i, h, r;
            for (f = Math.max(0, f), i = Math.floor(s / this.columnWidth), i -= s % this.columnWidth ? 0 : 1, i = Math.min(this.cols - 1, i), h = (this.options.isOriginTop ? u.top : u.bottom) + e.outerHeight, r = f; i >= r; r++) this.colYs[r] = Math.max(h, this.colYs[r])
         }, r.prototype._getContainerSize = function () {
            this.maxY = Math.max.apply(Math, this.colYs);
            var n = {
               height: this.maxY
            };
            return this.options.isFitWidth && (n.width = this._getContainerFitWidth()), n
         }, r.prototype._getContainerFitWidth = function () {
            for (var n = 0, t = this.cols; --t && 0 === this.colYs[t];) n++;
            return (this.cols - n) * this.columnWidth - this.gutter
         }, r.prototype.needsResizeLayout = function () {
            var n = this.containerWidth;
            return this.getContainerWidth(), n !== this.containerWidth
         }, r
      }
      var i = Array.prototype.indexOf ? function (n, t) {
         return n.indexOf(t)
      } : function (n, t) {
         for (var u, i = 0, r = n.length; r > i; i++)
            if (u = n[i], u === t) return i;
         return -1
      };
      "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size"], t) : "object" == typeof exports ? module.exports = t(require("outlayer"), require("get-size")) : n.Masonry = t(n.Outlayer, n.getSize)
   }(window);
! function (n, t) {
   n.fn.extend({
      scrollspy: function (i) {
         var u = {
            namespace: "scrollspy",
            activeClass: "active",
            animate: !1,
            offset: 0,
            container: t
         };
         i = n.extend({}, u, i);
         var r = function (n, t) {
               return parseInt(n, 10) + parseInt(t, 10)
            },
            f = function (t) {
               for (var f, o, u = [], i = 0; i < t.length; i++) {
                  var s = t[i],
                     e = n(s).attr("href"),
                     r = n(e);
                  r.length > 0 && (f = Math.floor(r.offset().top), o = f + Math.floor(r.outerHeight()), u.push({
                     element: r,
                     hash: e,
                     top: f,
                     bottom: o
                  }))
               }
               return u
            },
            e = function (t, i) {
               for (var u, r = 0; r < t.length; r++)
                  if (u = n(t[r]), u.attr("href") === i) return u
            },
            o = function (t) {
               for (var u, r = 0; r < t.length; r++) u = n(t[r]), u.parent().removeClass(i.activeClass)
            };
         return this.each(function () {
            for (var l, c, s = this, a = n(i.container), u = n(s).find("a"), h = 0; h < u.length; h++) {
               l = u[h];
               n(l).on("click", function (u) {
                  var o = n(this).attr("href"),
                     e = n(o),
                     f;
                  e.length > 0 && (f = r(e.offset().top, i.offset), i.animate ? n("html, body").animate({
                     scrollTop: f
                  }, 1e3) : t.scrollTo(0, f), u.preventDefault())
               })
            }
            c = f(u);
            a.bind("scroll." + i.namespace, function () {
               for (var l, f, a, t = {
                     top: r(n(this).scrollTop(), Math.abs(i.offset)),
                     left: n(this).scrollLeft()
                  }, h = 0; h < c.length; h++)
                  if (f = c[h], t.top >= f.top && t.top < f.bottom && (a = f.hash, l = e(u, a))) {
                     i.onChange && i.onChange(f.element, n(s), t);
                     o(u);
                     l.parent().addClass(i.activeClass);
                     break
                  }! l && i.onExit && i.onExit(n(s), t)
            })
         })
      }
   })
}(jQuery, window, document, void 0),
function (n) {
   typeof define == "function" && define.amd ? define(["jquery"], function (t) {
      return n(t)
   }) : typeof module == "object" && typeof module.exports == "object" ? exports = n(require("jquery")) : n(jQuery)
}(function (n) {
   function o(n) {
      var i = 7.5625,
         t = 2.75;
      return n < 1 / t ? i * n * n : n < 2 / t ? i * (n -= 1.5 / t) * n + .75 : n < 2.5 / t ? i * (n -= 2.25 / t) * n + .9375 : i * (n -= 2.625 / t) * n + .984375
   }
   n.easing.jswing = n.easing.swing;
   var t = Math.pow,
      u = Math.sqrt,
      i = Math.sin,
      s = Math.cos,
      r = Math.PI,
      f = 1.70158,
      e = f * 1.525,
      h = f + 1,
      c = 2 * r / 3,
      l = 2 * r / 4.5;
   n.extend(n.easing, {
      def: "easeOutQuad",
      swing: function (t) {
         return n.easing[n.easing.def](t)
      },
      easeInQuad: function (n) {
         return n * n
      },
      easeOutQuad: function (n) {
         return 1 - (1 - n) * (1 - n)
      },
      easeInOutQuad: function (n) {
         return n < .5 ? 2 * n * n : 1 - t(-2 * n + 2, 2) / 2
      },
      easeInCubic: function (n) {
         return n * n * n
      },
      easeOutCubic: function (n) {
         return 1 - t(1 - n, 3)
      },
      easeInOutCubic: function (n) {
         return n < .5 ? 4 * n * n * n : 1 - t(-2 * n + 2, 3) / 2
      },
      easeInQuart: function (n) {
         return n * n * n * n
      },
      easeOutQuart: function (n) {
         return 1 - t(1 - n, 4)
      },
      easeInOutQuart: function (n) {
         return n < .5 ? 8 * n * n * n * n : 1 - t(-2 * n + 2, 4) / 2
      },
      easeInQuint: function (n) {
         return n * n * n * n * n
      },
      easeOutQuint: function (n) {
         return 1 - t(1 - n, 5)
      },
      easeInOutQuint: function (n) {
         return n < .5 ? 16 * n * n * n * n * n : 1 - t(-2 * n + 2, 5) / 2
      },
      easeInSine: function (n) {
         return 1 - s(n * r / 2)
      },
      easeOutSine: function (n) {
         return i(n * r / 2)
      },
      easeInOutSine: function (n) {
         return -(s(r * n) - 1) / 2
      },
      easeInExpo: function (n) {
         return n === 0 ? 0 : t(2, 10 * n - 10)
      },
      easeOutExpo: function (n) {
         return n === 1 ? 1 : 1 - t(2, -10 * n)
      },
      easeInOutExpo: function (n) {
         return n === 0 ? 0 : n === 1 ? 1 : n < .5 ? t(2, 20 * n - 10) / 2 : (2 - t(2, -20 * n + 10)) / 2
      },
      easeInCirc: function (n) {
         return 1 - u(1 - t(n, 2))
      },
      easeOutCirc: function (n) {
         return u(1 - t(n - 1, 2))
      },
      easeInOutCirc: function (n) {
         return n < .5 ? (1 - u(1 - t(2 * n, 2))) / 2 : (u(1 - t(-2 * n + 2, 2)) + 1) / 2
      },
      easeInElastic: function (n) {
         return n === 0 ? 0 : n === 1 ? 1 : -t(2, 10 * n - 10) * i((n * 10 - 10.75) * c)
      },
      easeOutElastic: function (n) {
         return n === 0 ? 0 : n === 1 ? 1 : t(2, -10 * n) * i((n * 10 - .75) * c) + 1
      },
      easeInOutElastic: function (n) {
         return n === 0 ? 0 : n === 1 ? 1 : n < .5 ? -(t(2, 20 * n - 10) * i((20 * n - 11.125) * l)) / 2 : t(2, -20 * n + 10) * i((20 * n - 11.125) * l) / 2 + 1
      },
      easeInBack: function (n) {
         return h * n * n * n - f * n * n
      },
      easeOutBack: function (n) {
         return 1 + h * t(n - 1, 3) + f * t(n - 1, 2)
      },
      easeInOutBack: function (n) {
         return n < .5 ? t(2 * n, 2) * ((e + 1) * 2 * n - e) / 2 : (t(2 * n - 2, 2) * ((e + 1) * (n * 2 - 2) + e) + 2) / 2
      },
      easeInBounce: function (n) {
         return 1 - o(1 - n)
      },
      easeOutBounce: o,
      easeInOutBounce: function (n) {
         return n < .5 ? (1 - o(1 - 2 * n)) / 2 : (1 + o(2 * n - 1)) / 2
      }
   })
});
! function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(n.jQuery)
}(this, function (n) {
   ! function () {
      "use strict";

      function t(t, r) {
         if (this.el = t, this.$el = n(t), this.s = n.extend({}, i, r), this.s.dynamic && "undefined" !== this.s.dynamicEl && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) throw "When using dynamic mode, you must also define dynamicEl as an Array.";
         return this.modules = {}, this.lGalleryOn = !1, this.lgBusy = !1, this.hideBartimeout = !1, this.isTouch = "ontouchstart" in document.documentElement, this.s.slideEndAnimatoin && (this.s.hideControlOnEnd = !1), this.$items = this.s.dynamic ? this.s.dynamicEl : "this" === this.s.selector ? this.$el : "" !== this.s.selector ? this.s.selectWithin ? n(this.s.selectWithin).find(this.s.selector) : this.$el.find(n(this.s.selector)) : this.$el.children(), this.$slide = "", this.$outer = "", this.init(), this
      }
      var i = {
         mode: "lg-slide",
         cssEasing: "ease",
         easing: "linear",
         speed: 600,
         height: "100%",
         width: "100%",
         addClass: "",
         startClass: "lg-start-zoom",
         backdropDuration: 150,
         hideBarsDelay: 6e3,
         useLeft: !1,
         closable: !0,
         loop: !0,
         escKey: !0,
         keyPress: !0,
         controls: !0,
         slideEndAnimatoin: !0,
         hideControlOnEnd: !1,
         mousewheel: !0,
         getCaptionFromTitleOrAlt: !0,
         appendSubHtmlTo: ".lg-sub-html",
         subHtmlSelectorRelative: !1,
         preload: 1,
         showAfterLoad: !0,
         selector: "",
         selectWithin: "",
         nextHtml: "",
         prevHtml: "",
         index: !1,
         iframeMaxWidth: "100%",
         download: !0,
         counter: !0,
         appendCounterTo: ".lg-toolbar",
         swipeThreshold: 50,
         enableSwipe: !0,
         enableDrag: !0,
         dynamic: !1,
         dynamicEl: [],
         galleryId: 1
      };
      t.prototype.init = function () {
         var t = this,
            i;
         t.s.preload > t.$items.length && (t.s.preload = t.$items.length);
         i = window.location.hash;
         i.indexOf("lg=" + this.s.galleryId) > 0 && (t.index = parseInt(i.split("&slide=")[1], 10), n("body").addClass("lg-from-hash"), n("body").hasClass("lg-on") || (setTimeout(function () {
            t.build(t.index)
         }), n("body").addClass("lg-on")));
         t.s.dynamic ? (t.$el.trigger("onBeforeOpen.lg"), t.index = t.s.index || 0, n("body").hasClass("lg-on") || setTimeout(function () {
            t.build(t.index);
            n("body").addClass("lg-on")
         })) : t.$items.on("click.lgcustom", function (i) {
            try {
               i.preventDefault();
               i.preventDefault()
            } catch (n) {
               i.returnValue = !1
            }
            t.$el.trigger("onBeforeOpen.lg");
            t.index = t.s.index || t.$items.index(this);
            n("body").hasClass("lg-on") || (t.build(t.index), n("body").addClass("lg-on"))
         })
      };
      t.prototype.build = function (t) {
         var i = this;
         i.structure();
         n.each(n.fn.lightGallery.modules, function (t) {
            i.modules[t] = new n.fn.lightGallery.modules[t](i.el)
         });
         i.slide(t, !1, !1, !1);
         i.s.keyPress && i.keyPress();
         i.$items.length > 1 ? (i.arrow(), setTimeout(function () {
            i.enableDrag();
            i.enableSwipe()
         }, 50), i.s.mousewheel && i.mousewheel()) : i.$slide.on("click.lg", function () {
            i.$el.trigger("onSlideClick.lg")
         });
         i.counter();
         i.closeGallery();
         i.$el.trigger("onAfterOpen.lg");
         i.$outer.on("mousemove.lg click.lg touchstart.lg", function () {
            i.$outer.removeClass("lg-hide-items");
            clearTimeout(i.hideBartimeout);
            i.hideBartimeout = setTimeout(function () {
               i.$outer.addClass("lg-hide-items")
            }, i.s.hideBarsDelay)
         });
         i.$outer.trigger("mousemove.lg")
      };
      t.prototype.structure = function () {
         var u, f = "",
            e = "",
            t = 0,
            o = "",
            i = this,
            r;
         for (n("body").append('<div class="lg-backdrop"><\/div>'), n(".lg-backdrop").css("transition-duration", this.s.backdropDuration + "ms"), t = 0; t < this.$items.length; t++) f += '<div class="lg-item"><\/div>';
         (this.s.controls && this.$items.length > 1 && (e = '<div class="lg-actions"><button class="lg-prev lg-icon">' + this.s.prevHtml + '<\/button><button class="lg-next lg-icon">' + this.s.nextHtml + "<\/button><\/div>"), ".lg-sub-html" === this.s.appendSubHtmlTo && (o = '<div class="lg-sub-html"><\/div>'), u = '<div class="lg-outer ' + this.s.addClass + " " + this.s.startClass + '"><div class="lg" style="width:' + this.s.width + "; height:" + this.s.height + '"><div class="lg-inner">' + f + '<\/div><div class="lg-toolbar lg-group"><span class="lg-close lg-icon"><\/span><\/div>' + e + o + "<\/div><\/div>", n("body").append(u), this.$outer = n(".lg-outer"), this.$slide = this.$outer.find(".lg-item"), this.s.useLeft ? (this.$outer.addClass("lg-use-left"), this.s.mode = "lg-slide") : this.$outer.addClass("lg-use-css3"), i.setTop(), n(window).on("resize.lg orientationchange.lg", function () {
            setTimeout(function () {
               i.setTop()
            }, 100)
         }), this.$slide.eq(this.index).addClass("lg-current"), this.doCss() ? this.$outer.addClass("lg-css3") : (this.$outer.addClass("lg-css"), this.s.speed = 0), this.$outer.addClass(this.s.mode), this.s.enableDrag && this.$items.length > 1 && this.$outer.addClass("lg-grab"), this.s.showAfterLoad && this.$outer.addClass("lg-show-after-load"), this.doCss()) && (r = this.$outer.find(".lg-inner"), r.css("transition-timing-function", this.s.cssEasing), r.css("transition-duration", this.s.speed + "ms"));
         setTimeout(function () {
            n(".lg-backdrop").addClass("in")
         });
         setTimeout(function () {
            i.$outer.addClass("lg-visible")
         }, this.s.backdropDuration);
         this.s.download && this.$outer.find(".lg-toolbar").append('<a id="lg-download" target="_blank" download class="lg-download lg-icon"><\/a>');
         this.prevScrollTop = n(window).scrollTop()
      };
      t.prototype.setTop = function () {
         if ("100%" !== this.s.height) {
            var t = n(window).height(),
               r = (t - parseInt(this.s.height, 10)) / 2,
               i = this.$outer.find(".lg");
            t >= parseInt(this.s.height, 10) ? i.css("top", r + "px") : i.css("top", "0px")
         }
      };
      t.prototype.doCss = function () {
         return !! function () {
            for (var t = ["transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition"], i = document.documentElement, n = 0, n = 0; n < t.length; n++)
               if (t[n] in i.style) return !0
         }()
      };
      t.prototype.isVideo = function (n, t) {
         var i;
         if (i = this.s.dynamic ? this.s.dynamicEl[t].html : this.$items.eq(t).attr("data-html"), !n) return i ? {
            html5: !0
         } : (console.error("lightGallery :- data-src is not pvovided on slide item " + (t + 1) + ". Please make sure the selector property is properly configured. More info - http://sachinchoolur.github.io/lightGallery/demos/html-markup.html"), !1);
         var r = n.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com|be-nocookie\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i),
            u = n.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
            f = n.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i),
            e = n.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);
         return r ? {
            youtube: r
         } : u ? {
            vimeo: u
         } : f ? {
            dailymotion: f
         } : e ? {
            vk: e
         } : void 0
      };
      t.prototype.counter = function () {
         this.s.counter && n(this.s.appendCounterTo).append('<div id="lg-counter"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '<\/span> / <span id="lg-counter-all">' + this.$items.length + "<\/span><\/div>")
      };
      t.prototype.addHtml = function (t) {
         var r, u, i = null,
            f;
         (this.s.dynamic ? this.s.dynamicEl[t].subHtmlUrl ? r = this.s.dynamicEl[t].subHtmlUrl : i = this.s.dynamicEl[t].subHtml : (u = this.$items.eq(t), u.attr("data-sub-html-url") ? r = u.attr("data-sub-html-url") : (i = u.attr("data-sub-html"), this.s.getCaptionFromTitleOrAlt && !i && (i = u.attr("title") || u.find("img").first().attr("alt")))), r) || (void 0 !== i && null !== i ? (f = i.substring(0, 1), "." !== f && "#" !== f || (i = this.s.subHtmlSelectorRelative && !this.s.dynamic ? u.find(i).html() : n(i).html())) : i = "");
         ".lg-sub-html" === this.s.appendSubHtmlTo ? r ? this.$outer.find(this.s.appendSubHtmlTo).load(r) : this.$outer.find(this.s.appendSubHtmlTo).html(i) : r ? this.$slide.eq(t).load(r) : this.$slide.eq(t).append(i);
         void 0 !== i && null !== i && ("" === i ? this.$outer.find(this.s.appendSubHtmlTo).addClass("lg-empty-html") : this.$outer.find(this.s.appendSubHtmlTo).removeClass("lg-empty-html"));
         this.$el.trigger("onAfterAppendSubHtml.lg", [t])
      };
      t.prototype.preload = function (n) {
         for (var t = 1, i = 1, t = 1; t <= this.s.preload && !(t >= this.$items.length - n); t++) this.loadContent(n + t, !1, 0);
         for (i = 1; i <= this.s.preload && !(n - i < 0); i++) this.loadContent(n - i, !1, 0)
      };
      t.prototype.loadContent = function (t, i, r) {
         var o, e, a, s, h, v, u = this,
            c = !1,
            p = function (t) {
               for (var i, s, r, u = [], o = [], f = 0; f < t.length; f++) i = t[f].split(" "), "" === i[0] && i.splice(0, 1), o.push(i[0]), u.push(i[1]);
               for (s = n(window).width(), r = 0; r < u.length; r++)
                  if (parseInt(u[r], 10) > s) {
                     e = o[r];
                     break
                  }
            },
            l, f, y;
         if (u.s.dynamic ? ((u.s.dynamicEl[t].poster && (c = !0, a = u.s.dynamicEl[t].poster), v = u.s.dynamicEl[t].html, e = u.s.dynamicEl[t].src, u.s.dynamicEl[t].responsive) && p(u.s.dynamicEl[t].responsive.split(",")), s = u.s.dynamicEl[t].srcset, h = u.s.dynamicEl[t].sizes) : ((u.$items.eq(t).attr("data-poster") && (c = !0, a = u.$items.eq(t).attr("data-poster")), v = u.$items.eq(t).attr("data-html"), e = u.$items.eq(t).attr("href") || u.$items.eq(t).attr("data-src"), u.$items.eq(t).attr("data-responsive")) && p(u.$items.eq(t).attr("data-responsive").split(",")), s = u.$items.eq(t).attr("data-srcset"), h = u.$items.eq(t).attr("data-sizes")), l = !1, u.s.dynamic ? u.s.dynamicEl[t].iframe && (l = !0) : "true" === u.$items.eq(t).attr("data-iframe") && (l = !0), f = u.isVideo(e, t), !u.$slide.eq(t).hasClass("lg-loaded")) {
            if (l ? u.$slide.eq(t).prepend('<div class="lg-video-cont lg-has-iframe" style="max-width:' + u.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + e + '"  allowfullscreen="true"><\/iframe><\/div><\/div>') : c ? (y = "", y = f && f.youtube ? "lg-has-youtube" : f && f.vimeo ? "lg-has-vimeo" : "lg-has-html5", u.$slide.eq(t).prepend('<div class="lg-video-cont ' + y + ' "><div class="lg-video"><span class="lg-video-play"><\/span><img class="lg-object lg-has-poster" src="' + a + '" /><\/div><\/div>')) : f ? (u.$slide.eq(t).prepend('<div class="lg-video-cont "><div class="lg-video"><\/div><\/div>'), u.$el.trigger("hasVideo.lg", [t, e, v])) : u.$slide.eq(t).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" src="' + e + '" /><\/div>'), u.$el.trigger("onAferAppendSlide.lg", [t]), o = u.$slide.eq(t).find(".lg-object"), h && o.attr("sizes", h), s) {
               o.attr("srcset", s);
               try {
                  picturefill({
                     elements: [o[0]]
                  })
               } catch (n) {
                  console.warn("lightGallery :- If you want srcset to be supported for older browser please include picturefil version 2 javascript library in your document.")
               }
            }
            ".lg-sub-html" !== this.s.appendSubHtmlTo && u.addHtml(t);
            u.$slide.eq(t).addClass("lg-loaded")
         }
         u.$slide.eq(t).find(".lg-object").on("load.lg error.lg", function () {
            var i = 0;
            r && !n("body").hasClass("lg-from-hash") && (i = r);
            setTimeout(function () {
               u.$slide.eq(t).addClass("lg-complete");
               u.$el.trigger("onSlideItemLoad.lg", [t, r || 0])
            }, i)
         });
         f && f.html5 && !c && u.$slide.eq(t).addClass("lg-complete");
         !0 === i && (u.$slide.eq(t).hasClass("lg-complete") ? u.preload(t) : u.$slide.eq(t).find(".lg-object").on("load.lg error.lg", function () {
            u.preload(t)
         }))
      };
      t.prototype.slide = function (t, i, r, u) {
         var e = this.$outer.find(".lg-current").index(),
            f = this,
            o, l, c, s, h;
         f.lGalleryOn && e === t || (o = this.$slide.length, l = f.lGalleryOn ? this.s.speed : 0, f.lgBusy || (this.s.download && (c = f.s.dynamic ? !1 !== f.s.dynamicEl[t].downloadUrl && (f.s.dynamicEl[t].downloadUrl || f.s.dynamicEl[t].src) : "false" !== f.$items.eq(t).attr("data-download-url") && (f.$items.eq(t).attr("data-download-url") || f.$items.eq(t).attr("href") || f.$items.eq(t).attr("data-src")), c ? (n("#lg-download").attr("href", c), f.$outer.removeClass("lg-hide-download")) : f.$outer.addClass("lg-hide-download")), (this.$el.trigger("onBeforeSlide.lg", [e, t, i, r]), f.lgBusy = !0, clearTimeout(f.hideBartimeout), ".lg-sub-html" === this.s.appendSubHtmlTo && setTimeout(function () {
            f.addHtml(t)
         }, l), this.arrowDisable(t), u || (t < e ? u = "prev" : t > e && (u = "next")), i) ? (this.$slide.removeClass("lg-prev-slide lg-current lg-next-slide"), o > 2 ? (s = t - 1, h = t + 1, 0 === t && e === o - 1 ? (h = 0, s = o - 1) : t === o - 1 && 0 === e && (h = 0, s = o - 1)) : (s = 0, h = 1), "prev" === u ? f.$slide.eq(h).addClass("lg-next-slide") : f.$slide.eq(s).addClass("lg-prev-slide"), f.$slide.eq(t).addClass("lg-current")) : (f.$outer.addClass("lg-no-trans"), this.$slide.removeClass("lg-prev-slide lg-next-slide"), "prev" === u ? (this.$slide.eq(t).addClass("lg-prev-slide"), this.$slide.eq(e).addClass("lg-next-slide")) : (this.$slide.eq(t).addClass("lg-next-slide"), this.$slide.eq(e).addClass("lg-prev-slide")), setTimeout(function () {
            f.$slide.removeClass("lg-current");
            f.$slide.eq(t).addClass("lg-current");
            f.$outer.removeClass("lg-no-trans")
         }, 50)), f.lGalleryOn ? (setTimeout(function () {
            f.loadContent(t, !0, 0)
         }, this.s.speed + 50), setTimeout(function () {
            f.lgBusy = !1;
            f.$el.trigger("onAfterSlide.lg", [e, t, i, r])
         }, this.s.speed)) : (f.loadContent(t, !0, f.s.backdropDuration), f.lgBusy = !1, f.$el.trigger("onAfterSlide.lg", [e, t, i, r])), f.lGalleryOn = !0, this.s.counter && n("#lg-counter-current").text(t + 1)), f.index = t)
      };
      t.prototype.goToNextSlide = function (n) {
         var t = this,
            i = t.s.loop;
         n && t.$slide.length < 3 && (i = !1);
         t.lgBusy || (t.index + 1 < t.$slide.length ? (t.index++, t.$el.trigger("onBeforeNextSlide.lg", [t.index]), t.slide(t.index, n, !1, "next")) : i ? (t.index = 0, t.$el.trigger("onBeforeNextSlide.lg", [t.index]), t.slide(t.index, n, !1, "next")) : t.s.slideEndAnimatoin && !n && (t.$outer.addClass("lg-right-end"), setTimeout(function () {
            t.$outer.removeClass("lg-right-end")
         }, 400)))
      };
      t.prototype.goToPrevSlide = function (n) {
         var t = this,
            i = t.s.loop;
         n && t.$slide.length < 3 && (i = !1);
         t.lgBusy || (t.index > 0 ? (t.index--, t.$el.trigger("onBeforePrevSlide.lg", [t.index, n]), t.slide(t.index, n, !1, "prev")) : i ? (t.index = t.$items.length - 1, t.$el.trigger("onBeforePrevSlide.lg", [t.index, n]), t.slide(t.index, n, !1, "prev")) : t.s.slideEndAnimatoin && !n && (t.$outer.addClass("lg-left-end"), setTimeout(function () {
            t.$outer.removeClass("lg-left-end")
         }, 400)))
      };
      t.prototype.keyPress = function () {
         var t = this;
         this.$items.length > 1 && n(window).on("keyup.lg", function (n) {
            t.$items.length > 1 && (37 === n.keyCode && (n.preventDefault(), t.goToPrevSlide()), 39 === n.keyCode && (n.preventDefault(), t.goToNextSlide()))
         });
         n(window).on("keydown.lg", function (n) {
            !0 === t.s.escKey && 27 === n.keyCode && (n.preventDefault(), t.$outer.hasClass("lg-thumb-open") ? t.$outer.removeClass("lg-thumb-open") : t.destroy())
         })
      };
      t.prototype.arrow = function () {
         var n = this;
         this.$outer.find(".lg-prev").on("click.lg", function () {
            n.goToPrevSlide()
         });
         this.$outer.find(".lg-next").on("click.lg", function () {
            n.goToNextSlide()
         })
      };
      t.prototype.arrowDisable = function (n) {
         !this.s.loop && this.s.hideControlOnEnd && (n + 1 < this.$slide.length ? this.$outer.find(".lg-next").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-next").attr("disabled", "disabled").addClass("disabled"), n > 0 ? this.$outer.find(".lg-prev").removeAttr("disabled").removeClass("disabled") : this.$outer.find(".lg-prev").attr("disabled", "disabled").addClass("disabled"))
      };
      t.prototype.setTranslate = function (n, t, i) {
         this.s.useLeft ? n.css("left", t) : n.css({
            transform: "translate3d(" + t + "px, " + i + "px, 0px)"
         })
      };
      t.prototype.touchMove = function (t, i) {
         var r = i - t;
         Math.abs(r) > 15 && (this.$outer.addClass("lg-dragging"), this.setTranslate(this.$slide.eq(this.index), r, 0), this.setTranslate(n(".lg-prev-slide"), -this.$slide.eq(this.index).width() + r, 0), this.setTranslate(n(".lg-next-slide"), this.$slide.eq(this.index).width() + r, 0))
      };
      t.prototype.touchEnd = function (n) {
         var t = this;
         "lg-slide" !== t.s.mode && t.$outer.addClass("lg-slide");
         this.$slide.not(".lg-current, .lg-prev-slide, .lg-next-slide").css("opacity", "0");
         setTimeout(function () {
            t.$outer.removeClass("lg-dragging");
            n < 0 && Math.abs(n) > t.s.swipeThreshold ? t.goToNextSlide(!0) : n > 0 && Math.abs(n) > t.s.swipeThreshold ? t.goToPrevSlide(!0) : Math.abs(n) < 5 && t.$el.trigger("onSlideClick.lg");
            t.$slide.removeAttr("style")
         });
         setTimeout(function () {
            t.$outer.hasClass("lg-dragging") || "lg-slide" === t.s.mode || t.$outer.removeClass("lg-slide")
         }, t.s.speed + 100)
      };
      t.prototype.enableSwipe = function () {
         var n = this,
            t = 0,
            i = 0,
            r = !1;
         n.s.enableSwipe && n.doCss() && (n.$slide.on("touchstart.lg", function (i) {
            n.$outer.hasClass("lg-zoomed") || n.lgBusy || (i.preventDefault(), n.manageSwipeClass(), t = i.originalEvent.targetTouches[0].pageX)
         }), n.$slide.on("touchmove.lg", function (u) {
            n.$outer.hasClass("lg-zoomed") || (u.preventDefault(), i = u.originalEvent.targetTouches[0].pageX, n.touchMove(t, i), r = !0)
         }), n.$slide.on("touchend.lg", function () {
            n.$outer.hasClass("lg-zoomed") || (r ? (r = !1, n.touchEnd(i - t)) : n.$el.trigger("onSlideClick.lg"))
         }))
      };
      t.prototype.enableDrag = function () {
         var t = this,
            r = 0,
            u = 0,
            i = !1,
            f = !1;
         t.s.enableDrag && t.doCss() && (t.$slide.on("mousedown.lg", function (u) {
            t.$outer.hasClass("lg-zoomed") || t.lgBusy || n(u.target).text().trim() || (u.preventDefault(), t.manageSwipeClass(), r = u.pageX, i = !0, t.$outer.scrollLeft += 1, t.$outer.scrollLeft -= 1, t.$outer.removeClass("lg-grab").addClass("lg-grabbing"), t.$el.trigger("onDragstart.lg"))
         }), n(window).on("mousemove.lg", function (n) {
            i && (f = !0, u = n.pageX, t.touchMove(r, u), t.$el.trigger("onDragmove.lg"))
         }), n(window).on("mouseup.lg", function (e) {
            f ? (f = !1, t.touchEnd(u - r), t.$el.trigger("onDragend.lg")) : (n(e.target).hasClass("lg-object") || n(e.target).hasClass("lg-video-play")) && t.$el.trigger("onSlideClick.lg");
            i && (i = !1, t.$outer.removeClass("lg-grabbing").addClass("lg-grab"))
         }))
      };
      t.prototype.manageSwipeClass = function () {
         var t = this.index + 1,
            n = this.index - 1;
         this.s.loop && this.$slide.length > 2 && (0 === this.index ? n = this.$slide.length - 1 : this.index === this.$slide.length - 1 && (t = 0));
         this.$slide.removeClass("lg-next-slide lg-prev-slide");
         n > -1 && this.$slide.eq(n).addClass("lg-prev-slide");
         this.$slide.eq(t).addClass("lg-next-slide")
      };
      t.prototype.mousewheel = function () {
         var n = this;
         n.$outer.on("mousewheel.lg", function (t) {
            t.deltaY && (t.deltaY > 0 ? n.goToPrevSlide() : n.goToNextSlide(), t.preventDefault())
         })
      };
      t.prototype.closeGallery = function () {
         var t = this,
            i = !1;
         this.$outer.find(".lg-close").on("click.lg", function () {
            t.destroy()
         });
         t.s.closable && (t.$outer.on("mousedown.lg", function (t) {
            i = !!(n(t.target).is(".lg-outer") || n(t.target).is(".lg-item ") || n(t.target).is(".lg-img-wrap"))
         }), t.$outer.on("mousemove.lg", function () {
            i = !1
         }), t.$outer.on("mouseup.lg", function (r) {
            (n(r.target).is(".lg-outer") || n(r.target).is(".lg-item ") || n(r.target).is(".lg-img-wrap") && i) && (t.$outer.hasClass("lg-dragging") || t.destroy())
         }))
      };
      t.prototype.destroy = function (t) {
         var i = this;
         t || (i.$el.trigger("onBeforeClose.lg"), n(window).scrollTop(i.prevScrollTop));
         t && (i.s.dynamic || this.$items.off("click.lg click.lgcustom"), n.removeData(i.el, "lightGallery"));
         this.$el.off(".lg.tm");
         n.each(n.fn.lightGallery.modules, function (n) {
            i.modules[n] && i.modules[n].destroy()
         });
         this.lGalleryOn = !1;
         clearTimeout(i.hideBartimeout);
         this.hideBartimeout = !1;
         n(window).off(".lg");
         n("body").removeClass("lg-on lg-from-hash");
         i.$outer && i.$outer.removeClass("lg-visible");
         n(".lg-backdrop").removeClass("in");
         setTimeout(function () {
            i.$outer && i.$outer.remove();
            n(".lg-backdrop").remove();
            t || i.$el.trigger("onCloseAfter.lg")
         }, i.s.backdropDuration + 50)
      };
      n.fn.lightGallery = function (i) {
         return this.each(function () {
            if (n.data(this, "lightGallery")) try {
               n(this).data("lightGallery").init()
            } catch (n) {
               console.error("lightGallery has not initiated properly")
            } else n.data(this, "lightGallery", new t(this, i))
         })
      };
      n.fn.lightGallery.modules = {}
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            autoplay: !1,
            pause: 5e3,
            progressBar: !0,
            fourceAutoplay: !1,
            autoplayControls: !0,
            appendAutoplayControlsTo: ".lg-toolbar"
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.$el = n(t), !(this.core.$items.length < 2) && (this.core.s = n.extend({}, i, this.core.s), this.interval = !1, this.fromAuto = !0, this.canceledOnTouch = !1, this.fourceAutoplayTemp = this.core.s.fourceAutoplay, this.core.doCss() || (this.core.s.progressBar = !1), this.init(), this)
         };
      t.prototype.init = function () {
         var n = this;
         n.core.s.autoplayControls && n.controls();
         n.core.s.progressBar && n.core.$outer.find(".lg").append('<div class="lg-progress-bar"><div class="lg-progress"><\/div><\/div>');
         n.progress();
         n.core.s.autoplay && n.$el.one("onSlideItemLoad.lg.tm", function () {
            n.startlAuto()
         });
         n.$el.on("onDragstart.lg.tm touchstart.lg.tm", function () {
            n.interval && (n.cancelAuto(), n.canceledOnTouch = !0)
         });
         n.$el.on("onDragend.lg.tm touchend.lg.tm onSlideClick.lg.tm", function () {
            !n.interval && n.canceledOnTouch && (n.startlAuto(), n.canceledOnTouch = !1)
         })
      };
      t.prototype.progress = function () {
         var t, i, n = this;
         n.$el.on("onBeforeSlide.lg.tm", function () {
            n.core.s.progressBar && n.fromAuto && (t = n.core.$outer.find(".lg-progress-bar"), i = n.core.$outer.find(".lg-progress"), n.interval && (i.removeAttr("style"), t.removeClass("lg-start"), setTimeout(function () {
               i.css("transition", "width " + (n.core.s.speed + n.core.s.pause) + "ms ease 0s");
               t.addClass("lg-start")
            }, 20)));
            n.fromAuto || n.core.s.fourceAutoplay || n.cancelAuto();
            n.fromAuto = !1
         })
      };
      t.prototype.controls = function () {
         var t = this;
         n(this.core.s.appendAutoplayControlsTo).append('<span class="lg-autoplay-button lg-icon"><\/span>');
         t.core.$outer.find(".lg-autoplay-button").on("click.lg", function () {
            n(t.core.$outer).hasClass("lg-show-autoplay") ? (t.cancelAuto(), t.core.s.fourceAutoplay = !1) : t.interval || (t.startlAuto(), t.core.s.fourceAutoplay = t.fourceAutoplayTemp)
         })
      };
      t.prototype.startlAuto = function () {
         var n = this;
         n.core.$outer.find(".lg-progress").css("transition", "width " + (n.core.s.speed + n.core.s.pause) + "ms ease 0s");
         n.core.$outer.addClass("lg-show-autoplay");
         n.core.$outer.find(".lg-progress-bar").addClass("lg-start");
         n.interval = setInterval(function () {
            n.core.index + 1 < n.core.$items.length ? n.core.index++ : n.core.index = 0;
            n.fromAuto = !0;
            n.core.slide(n.core.index, !1, !1, "next")
         }, n.core.s.speed + n.core.s.pause)
      };
      t.prototype.cancelAuto = function () {
         clearInterval(this.interval);
         this.interval = !1;
         this.core.$outer.find(".lg-progress").removeAttr("style");
         this.core.$outer.removeClass("lg-show-autoplay");
         this.core.$outer.find(".lg-progress-bar").removeClass("lg-start")
      };
      t.prototype.destroy = function () {
         this.cancelAuto();
         this.core.$outer.find(".lg-progress-bar").remove()
      };
      n.fn.lightGallery.modules.autoplay = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            fullScreen: !0
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.$el = n(t), this.core.s = n.extend({}, i, this.core.s), this.init(), this
         };
      t.prototype.init = function () {
         var n = "";
         if (this.core.s.fullScreen) {
            if (!(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)) return;
            n = '<span class="lg-fullscreen lg-icon"><\/span>';
            this.core.$outer.find(".lg-toolbar").append(n);
            this.fullScreen()
         }
      };
      t.prototype.requestFullscreen = function () {
         var n = document.documentElement;
         n.requestFullscreen ? n.requestFullscreen() : n.msRequestFullscreen ? n.msRequestFullscreen() : n.mozRequestFullScreen ? n.mozRequestFullScreen() : n.webkitRequestFullscreen && n.webkitRequestFullscreen()
      };
      t.prototype.exitFullscreen = function () {
         document.fullscreenElement ? document.fullscreenElement() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen()
      };
      t.prototype.fullScreen = function () {
         var t = this;
         n(document).on("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg", function () {
            t.core.$outer.toggleClass("lg-fullscreen-on")
         });
         this.core.$outer.find(".lg-fullscreen").on("click.lg", function () {
            document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ? t.exitFullscreen() : t.requestFullscreen()
         })
      };
      t.prototype.destroy = function () {
         this.exitFullscreen();
         n(document).off("fullscreenchange.lg webkitfullscreenchange.lg mozfullscreenchange.lg MSFullscreenChange.lg")
      };
      n.fn.lightGallery.modules.fullscreen = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            pager: !1
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.$el = n(t), this.core.s = n.extend({}, i, this.core.s), this.core.s.pager && this.core.$items.length > 1 && this.init(), this
         };
      t.prototype.init = function () {
         var r, i, e, t = this,
            u = "",
            f;
         if (t.core.$outer.find(".lg").append('<div class="lg-pager-outer"><\/div>'), t.core.s.dynamic)
            for (f = 0; f < t.core.s.dynamicEl.length; f++) u += '<span class="lg-pager-cont"> <span class="lg-pager"><\/span><div class="lg-pager-thumb-cont"><span class="lg-caret"><\/span> <img src="' + t.core.s.dynamicEl[f].thumb + '" /><\/div><\/span>';
         else t.core.$items.each(function () {
            u += t.core.s.exThumbImage ? '<span class="lg-pager-cont"> <span class="lg-pager"><\/span><div class="lg-pager-thumb-cont"><span class="lg-caret"><\/span> <img src="' + n(this).attr(t.core.s.exThumbImage) + '" /><\/div><\/span>' : '<span class="lg-pager-cont"> <span class="lg-pager"><\/span><div class="lg-pager-thumb-cont"><span class="lg-caret"><\/span> <img src="' + n(this).find("img").attr("src") + '" /><\/div><\/span>'
         });
         i = t.core.$outer.find(".lg-pager-outer");
         i.html(u);
         r = t.core.$outer.find(".lg-pager-cont");
         r.on("click.lg touchend.lg", function () {
            var i = n(this);
            t.core.index = i.index();
            t.core.slide(t.core.index, !1, !0, !1)
         });
         i.on("mouseover.lg", function () {
            clearTimeout(e);
            i.addClass("lg-pager-hover")
         });
         i.on("mouseout.lg", function () {
            e = setTimeout(function () {
               i.removeClass("lg-pager-hover")
            })
         });
         t.core.$el.on("onBeforeSlide.lg.tm", function (n, t, i) {
            r.removeClass("lg-pager-active");
            r.eq(i).addClass("lg-pager-active")
         })
      };
      t.prototype.destroy = function () {};
      n.fn.lightGallery.modules.pager = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            thumbnail: !0,
            animateThumb: !0,
            currentPagerPosition: "middle",
            thumbWidth: 100,
            thumbHeight: "80px",
            thumbContHeight: 100,
            thumbMargin: 5,
            exThumbImage: !1,
            showThumbByDefault: !0,
            toogleThumb: !0,
            pullCaptionUp: !0,
            enableThumbDrag: !0,
            enableThumbSwipe: !0,
            swipeThreshold: 50,
            loadYoutubeThumbnail: !0,
            youtubeThumbSize: 1,
            loadVimeoThumbnail: !0,
            vimeoThumbSize: "thumbnail_small",
            loadDailymotionThumbnail: !0
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.core.s = n.extend({}, i, this.core.s), this.$el = n(t), this.$thumbOuter = null, this.thumbOuterWidth = 0, this.thumbTotalWidth = this.core.$items.length * (this.core.s.thumbWidth + this.core.s.thumbMargin), this.thumbIndex = this.core.index, this.core.s.animateThumb && (this.core.s.thumbHeight = "100%"), this.left = 0, this.init(), this
         };
      t.prototype.init = function () {
         var n = this;
         this.core.s.thumbnail && this.core.$items.length > 1 && (this.core.s.showThumbByDefault && setTimeout(function () {
            n.core.$outer.addClass("lg-thumb-open")
         }, 700), this.core.s.pullCaptionUp && this.core.$outer.addClass("lg-pull-caption-up"), this.build(), this.core.s.animateThumb && this.core.doCss() ? (this.core.s.enableThumbDrag && this.enableThumbDrag(), this.core.s.enableThumbSwipe && this.enableThumbSwipe(), this.thumbClickable = !1) : this.thumbClickable = !0, this.toogle(), this.thumbkeyPress())
      };
      t.prototype.build = function () {
         function f(n, i, r) {
            var o, f = t.core.isVideo(n, r) || {},
               s = "";
            f.youtube || f.vimeo || f.dailymotion ? f.youtube ? o = t.core.s.loadYoutubeThumbnail ? "//img.youtube.com/vi/" + f.youtube[1] + "/" + t.core.s.youtubeThumbSize + ".jpg" : i : f.vimeo ? t.core.s.loadVimeoThumbnail ? (o = "//i.vimeocdn.com/video/error_" + u + ".jpg", s = f.vimeo[1]) : o = i : f.dailymotion && (o = t.core.s.loadDailymotionThumbnail ? "//www.dailymotion.com/thumbnail/video/" + f.dailymotion[1] : i) : o = i;
            e += '<div data-vimeo-id="' + s + '" class="lg-thumb-item" style="width:' + t.core.s.thumbWidth + "px; height: " + t.core.s.thumbHeight + "; margin-right: " + t.core.s.thumbMargin + 'px"><img src="' + o + '" /><\/div>';
            s = ""
         }
         var i, t = this,
            e = "",
            u = "",
            r;
         switch (this.core.s.vimeoThumbSize) {
            case "thumbnail_large":
               u = "640";
               break;
            case "thumbnail_medium":
               u = "200x150";
               break;
            case "thumbnail_small":
               u = "100x75"
         }
         if (t.core.$outer.addClass("lg-has-thumb"), t.core.$outer.find(".lg").append('<div class="lg-thumb-outer"><div class="lg-thumb lg-group"><\/div><\/div>'), t.$thumbOuter = t.core.$outer.find(".lg-thumb-outer"), t.thumbOuterWidth = t.$thumbOuter.width(), t.core.s.animateThumb && t.core.$outer.find(".lg-thumb").css({
               width: t.thumbTotalWidth + "px",
               position: "relative"
            }), this.core.s.animateThumb && t.$thumbOuter.css("height", t.core.s.thumbContHeight + "px"), t.core.s.dynamic)
            for (r = 0; r < t.core.s.dynamicEl.length; r++) f(t.core.s.dynamicEl[r].src, t.core.s.dynamicEl[r].thumb, r);
         else t.core.$items.each(function (i) {
            t.core.s.exThumbImage ? f(n(this).attr("href") || n(this).attr("data-src"), n(this).attr(t.core.s.exThumbImage), i) : f(n(this).attr("href") || n(this).attr("data-src"), n(this).find("img").attr("src"), i)
         });
         t.core.$outer.find(".lg-thumb").html(e);
         i = t.core.$outer.find(".lg-thumb-item");
         i.each(function () {
            var i = n(this),
               r = i.attr("data-vimeo-id");
            r && n.getJSON("//www.vimeo.com/api/v2/video/" + r + ".json?callback=?", {
               format: "json"
            }, function (n) {
               i.find("img").attr("src", n[0][t.core.s.vimeoThumbSize])
            })
         });
         i.eq(t.core.index).addClass("active");
         t.core.$el.on("onBeforeSlide.lg.tm", function () {
            i.removeClass("active");
            i.eq(t.core.index).addClass("active")
         });
         i.on("click.lg touchend.lg", function () {
            var i = n(this);
            setTimeout(function () {
               (!t.thumbClickable || t.core.lgBusy) && t.core.doCss() || (t.core.index = i.index(), t.core.slide(t.core.index, !1, !0, !1))
            }, 50)
         });
         t.core.$el.on("onBeforeSlide.lg.tm", function () {
            t.animateThumb(t.core.index)
         });
         n(window).on("resize.lg.thumb orientationchange.lg.thumb", function () {
            setTimeout(function () {
               t.animateThumb(t.core.index);
               t.thumbOuterWidth = t.$thumbOuter.width()
            }, 200)
         })
      };
      t.prototype.setTranslate = function (n) {
         this.core.$outer.find(".lg-thumb").css({
            transform: "translate3d(-" + n + "px, 0px, 0px)"
         })
      };
      t.prototype.animateThumb = function (n) {
         var i = this.core.$outer.find(".lg-thumb"),
            t;
         if (this.core.s.animateThumb) {
            switch (this.core.s.currentPagerPosition) {
               case "left":
                  t = 0;
                  break;
               case "middle":
                  t = this.thumbOuterWidth / 2 - this.core.s.thumbWidth / 2;
                  break;
               case "right":
                  t = this.thumbOuterWidth - this.core.s.thumbWidth
            }
            this.left = (this.core.s.thumbWidth + this.core.s.thumbMargin) * n - 1 - t;
            this.left > this.thumbTotalWidth - this.thumbOuterWidth && (this.left = this.thumbTotalWidth - this.thumbOuterWidth);
            this.left < 0 && (this.left = 0);
            this.core.lGalleryOn ? (i.hasClass("on") || this.core.$outer.find(".lg-thumb").css("transition-duration", this.core.s.speed + "ms"), this.core.doCss() || i.animate({
               left: -this.left + "px"
            }, this.core.s.speed)) : this.core.doCss() || i.css("left", -this.left + "px");
            this.setTranslate(this.left)
         }
      };
      t.prototype.enableThumbDrag = function () {
         var t = this,
            u = 0,
            f = 0,
            r = !1,
            e = !1,
            i = 0;
         t.$thumbOuter.addClass("lg-grab");
         t.core.$outer.find(".lg-thumb").on("mousedown.lg.thumb", function (n) {
            t.thumbTotalWidth > t.thumbOuterWidth && (n.preventDefault(), u = n.pageX, r = !0, t.core.$outer.scrollLeft += 1, t.core.$outer.scrollLeft -= 1, t.thumbClickable = !1, t.$thumbOuter.removeClass("lg-grab").addClass("lg-grabbing"))
         });
         n(window).on("mousemove.lg.thumb", function (n) {
            r && (i = t.left, e = !0, f = n.pageX, t.$thumbOuter.addClass("lg-dragging"), i -= f - u, i > t.thumbTotalWidth - t.thumbOuterWidth && (i = t.thumbTotalWidth - t.thumbOuterWidth), i < 0 && (i = 0), t.setTranslate(i))
         });
         n(window).on("mouseup.lg.thumb", function () {
            e ? (e = !1, t.$thumbOuter.removeClass("lg-dragging"), t.left = i, Math.abs(f - u) < t.core.s.swipeThreshold && (t.thumbClickable = !0)) : t.thumbClickable = !0;
            r && (r = !1, t.$thumbOuter.removeClass("lg-grabbing").addClass("lg-grab"))
         })
      };
      t.prototype.enableThumbSwipe = function () {
         var n = this,
            i = 0,
            r = 0,
            u = !1,
            t = 0;
         n.core.$outer.find(".lg-thumb").on("touchstart.lg", function (t) {
            n.thumbTotalWidth > n.thumbOuterWidth && (t.preventDefault(), i = t.originalEvent.targetTouches[0].pageX, n.thumbClickable = !1)
         });
         n.core.$outer.find(".lg-thumb").on("touchmove.lg", function (f) {
            n.thumbTotalWidth > n.thumbOuterWidth && (f.preventDefault(), r = f.originalEvent.targetTouches[0].pageX, u = !0, n.$thumbOuter.addClass("lg-dragging"), t = n.left, t -= r - i, t > n.thumbTotalWidth - n.thumbOuterWidth && (t = n.thumbTotalWidth - n.thumbOuterWidth), t < 0 && (t = 0), n.setTranslate(t))
         });
         n.core.$outer.find(".lg-thumb").on("touchend.lg", function () {
            n.thumbTotalWidth > n.thumbOuterWidth && u ? (u = !1, n.$thumbOuter.removeClass("lg-dragging"), Math.abs(r - i) < n.core.s.swipeThreshold && (n.thumbClickable = !0), n.left = t) : n.thumbClickable = !0
         })
      };
      t.prototype.toogle = function () {
         var n = this;
         n.core.s.toogleThumb && (n.core.$outer.addClass("lg-can-toggle"), n.$thumbOuter.append('<span class="lg-toogle-thumb lg-icon"><\/span>'), n.core.$outer.find(".lg-toogle-thumb").on("click.lg", function () {
            n.core.$outer.toggleClass("lg-thumb-open")
         }))
      };
      t.prototype.thumbkeyPress = function () {
         var t = this;
         n(window).on("keydown.lg.thumb", function (n) {
            38 === n.keyCode ? (n.preventDefault(), t.core.$outer.addClass("lg-thumb-open")) : 40 === n.keyCode && (n.preventDefault(), t.core.$outer.removeClass("lg-thumb-open"))
         })
      };
      t.prototype.destroy = function () {
         this.core.s.thumbnail && this.core.$items.length > 1 && (n(window).off("resize.lg.thumb orientationchange.lg.thumb keydown.lg.thumb"), this.$thumbOuter.remove(), this.core.$outer.removeClass("lg-has-thumb"))
      };
      n.fn.lightGallery.modules.Thumbnail = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(n.jQuery)
}(this, function (n) {
   ! function () {
      "use strict";

      function i(n, t, i, r) {
         var u = this;
         if (u.core.$slide.eq(t).find(".lg-video").append(u.loadVideo(i, "lg-object", !0, t, r)), r)
            if (u.core.s.videojs) try {
               videojs(u.core.$slide.eq(t).find(".lg-html5").get(0), u.core.s.videojsOptions, function () {
                  !u.videoLoaded && u.core.s.autoplayFirstVideo && this.play()
               })
            } catch (n) {
               console.error("Make sure you have included videojs")
            } else !u.videoLoaded && u.core.s.autoplayFirstVideo && u.core.$slide.eq(t).find(".lg-html5").get(0).play()
      }

      function r(n, t) {
         var i = this.core.$slide.eq(t).find(".lg-video-cont");
         i.hasClass("lg-has-iframe") || (i.css("max-width", this.core.s.videoMaxWidth), this.videoLoaded = !0)
      }

      function u(t, i, r) {
         var u = this,
            f = u.core.$slide.eq(i),
            h = f.find(".lg-youtube").get(0),
            c = f.find(".lg-vimeo").get(0),
            l = f.find(".lg-dailymotion").get(0),
            o = f.find(".lg-vk").get(0),
            s = f.find(".lg-html5").get(0),
            a, e;
         if (h) h.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*");
         else if (c) try {
               $f(c).api("pause")
            } catch (n) {
               console.error("Make sure you have included froogaloop2 js")
            } else if (l) l.contentWindow.postMessage("pause", "*");
            else if (s)
            if (u.core.s.videojs) try {
               videojs(s).pause()
            } catch (n) {
               console.error("Make sure you have included videojs")
            } else s.pause();
         o && n(o).attr("src", n(o).attr("src").replace("&autoplay", "&noplay"));
         a = u.core.s.dynamic ? u.core.s.dynamicEl[r].src : u.core.$items.eq(r).attr("href") || u.core.$items.eq(r).attr("data-src");
         e = u.core.isVideo(a, r) || {};
         (e.youtube || e.vimeo || e.dailymotion || e.vk) && u.core.$outer.addClass("lg-hide-download")
      }
      var f = {
            videoMaxWidth: "855px",
            autoplayFirstVideo: !0,
            youtubePlayerParams: !1,
            vimeoPlayerParams: !1,
            dailymotionPlayerParams: !1,
            vkPlayerParams: !1,
            videojs: !1,
            videojsOptions: {}
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.$el = n(t), this.core.s = n.extend({}, f, this.core.s), this.videoLoaded = !1, this.init(), this
         };
      t.prototype.init = function () {
         var t = this;
         t.core.$el.on("hasVideo.lg.tm", i.bind(this));
         t.core.$el.on("onAferAppendSlide.lg.tm", r.bind(this));
         t.core.doCss() && t.core.$items.length > 1 && (t.core.s.enableSwipe || t.core.s.enableDrag) ? t.core.$el.on("onSlideClick.lg.tm", function () {
            var n = t.core.$slide.eq(t.core.index);
            t.loadVideoOnclick(n)
         }) : t.core.$slide.on("click.lg", function () {
            t.loadVideoOnclick(n(this))
         });
         t.core.$el.on("onBeforeSlide.lg.tm", u.bind(this));
         t.core.$el.on("onAfterSlide.lg.tm", function (n, i) {
            t.core.$slide.eq(i).removeClass("lg-video-playing")
         });
         t.core.s.autoplayFirstVideo && t.core.$el.on("onAferAppendSlide.lg.tm", function (n, i) {
            if (!t.core.lGalleryOn) {
               var r = t.core.$slide.eq(i);
               setTimeout(function () {
                  t.loadVideoOnclick(r)
               }, 100)
            }
         })
      };
      t.prototype.loadVideo = function (t, i, r, u, f) {
         var s = "",
            h = 1,
            e = "",
            o = this.core.isVideo(t, u) || {},
            c;
         return (r && (h = this.videoLoaded ? 0 : this.core.s.autoplayFirstVideo ? 1 : 0), o.youtube) ? (e = "?wmode=opaque&autoplay=" + h + "&enablejsapi=1", this.core.s.youtubePlayerParams && (e = e + "&" + n.param(this.core.s.youtubePlayerParams)), s = '<iframe class="lg-video-object lg-youtube ' + i + '" width="560" height="315" src="//www.youtube.com/embed/' + o.youtube[1] + e + '" frameborder="0" allowfullscreen><\/iframe>') : o.vimeo ? (e = "?autoplay=" + h + "&api=1", this.core.s.vimeoPlayerParams && (e = e + "&" + n.param(this.core.s.vimeoPlayerParams)), s = '<iframe class="lg-video-object lg-vimeo ' + i + '" width="560" height="315"  src="//player.vimeo.com/video/' + o.vimeo[1] + e + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen><\/iframe>') : o.dailymotion ? (e = "?wmode=opaque&autoplay=" + h + "&api=postMessage", this.core.s.dailymotionPlayerParams && (e = e + "&" + n.param(this.core.s.dailymotionPlayerParams)), s = '<iframe class="lg-video-object lg-dailymotion ' + i + '" width="560" height="315" src="//www.dailymotion.com/embed/video/' + o.dailymotion[1] + e + '" frameborder="0" allowfullscreen><\/iframe>') : o.html5 ? (c = f.substring(0, 1), "." !== c && "#" !== c || (f = n(f).html()), s = f) : o.vk && (e = "&autoplay=" + h, this.core.s.vkPlayerParams && (e = e + "&" + n.param(this.core.s.vkPlayerParams)), s = '<iframe class="lg-video-object lg-vk ' + i + '" width="560" height="315" src="//vk.com/video_ext.php?' + o.vk[1] + e + '" frameborder="0" allowfullscreen><\/iframe>'), s
      };
      t.prototype.loadVideoOnclick = function (n) {
         var t = this,
            i, r, f, h;
         if (n.find(".lg-object").hasClass("lg-has-poster") && n.find(".lg-object").is(":visible"))
            if (n.hasClass("lg-has-video")) {
               var e = n.find(".lg-youtube").get(0),
                  o = n.find(".lg-vimeo").get(0),
                  s = n.find(".lg-dailymotion").get(0),
                  u = n.find(".lg-html5").get(0);
               if (e) e.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*");
               else if (o) try {
                     $f(o).api("play")
                  } catch (n) {
                     console.error("Make sure you have included froogaloop2 js")
                  } else if (s) s.contentWindow.postMessage("play", "*");
                  else if (u)
                  if (t.core.s.videojs) try {
                     videojs(u).play()
                  } catch (n) {
                     console.error("Make sure you have included videojs")
                  } else u.play();
               n.addClass("lg-video-playing")
            } else n.addClass("lg-video-playing lg-has-video"), f = function (i, r) {
               if (n.find(".lg-video").append(t.loadVideo(i, "", !1, t.core.index, r)), r)
                  if (t.core.s.videojs) try {
                     videojs(t.core.$slide.eq(t.core.index).find(".lg-html5").get(0), t.core.s.videojsOptions, function () {
                        this.play()
                     })
                  } catch (n) {
                     console.error("Make sure you have included videojs")
                  } else t.core.$slide.eq(t.core.index).find(".lg-html5").get(0).play()
            }, t.core.s.dynamic ? (i = t.core.s.dynamicEl[t.core.index].src, r = t.core.s.dynamicEl[t.core.index].html, f(i, r)) : (i = t.core.$items.eq(t.core.index).attr("href") || t.core.$items.eq(t.core.index).attr("data-src"), r = t.core.$items.eq(t.core.index).attr("data-html"), f(i, r)), h = n.find(".lg-object"), n.find(".lg-video").append(h), n.find(".lg-video-object").hasClass("lg-html5") || (n.removeClass("lg-complete"), n.find(".lg-video-object").on("load.lg error.lg", function () {
               n.addClass("lg-complete")
            }))
      };
      t.prototype.destroy = function () {
         this.videoLoaded = !1
      };
      n.fn.lightGallery.modules.video = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = function () {
            var n = !1,
               t = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);
            return t && parseInt(t[2], 10) < 54 && (n = !0), n
         },
         r = {
            scale: 1,
            zoom: !0,
            actualSize: !0,
            enableZoomAfter: 300,
            useLeftForZoom: i()
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.core.s = n.extend({}, r, this.core.s), this.core.s.zoom && this.core.doCss() && (this.init(), this.zoomabletimeout = !1, this.pageX = n(window).width() / 2, this.pageY = n(window).height() / 2 + n(window).scrollTop()), this
         };
      t.prototype.init = function () {
         var t = this,
            e = '<span id="lg-zoom-in" class="lg-icon"><\/span><span id="lg-zoom-out" class="lg-icon"><\/span>';
         t.core.s.actualSize && (e += '<span id="lg-actual-size" class="lg-icon"><\/span>');
         t.core.s.useLeftForZoom ? t.core.$outer.addClass("lg-use-left-for-zoom") : t.core.$outer.addClass("lg-use-transition-for-zoom");
         this.core.$outer.find(".lg-toolbar").append(e);
         t.core.$el.on("onSlideItemLoad.lg.tm.zoom", function (i, r, u) {
            var f = t.core.s.enableZoomAfter + u;
            n("body").hasClass("lg-from-hash") && u ? f = 0 : n("body").removeClass("lg-from-hash");
            t.zoomabletimeout = setTimeout(function () {
               t.core.$slide.eq(r).addClass("lg-zoomable")
            }, f + 30)
         });
         var i = 1,
            o = function (i) {
               var e, o, r = t.core.$outer.find(".lg-current .lg-image"),
                  s = (n(window).width() - r.prop("offsetWidth")) / 2,
                  h = (n(window).height() - r.prop("offsetHeight")) / 2 + n(window).scrollTop(),
                  u, f;
               e = t.pageX - s;
               o = t.pageY - h;
               u = (i - 1) * e;
               f = (i - 1) * o;
               r.css("transform", "scale3d(" + i + ", " + i + ", 1)").attr("data-scale", i);
               t.core.s.useLeftForZoom ? r.parent().css({
                  left: -u + "px",
                  top: -f + "px"
               }).attr("data-x", u).attr("data-y", f) : r.parent().css("transform", "translate3d(-" + u + "px, -" + f + "px, 0)").attr("data-x", u).attr("data-y", f)
            },
            u = function () {
               i > 1 ? t.core.$outer.addClass("lg-zoomed") : t.resetZoom();
               i < 1 && (i = 1);
               o(i)
            },
            f = function (r, f, e, o) {
               var h, s = f.prop("offsetWidth"),
                  c;
               h = t.core.s.dynamic ? t.core.s.dynamicEl[e].width || f[0].naturalWidth || s : t.core.$items.eq(e).attr("data-width") || f[0].naturalWidth || s;
               t.core.$outer.hasClass("lg-zoomed") ? i = 1 : h > s && (c = h / s, i = c || 2);
               o ? (t.pageX = n(window).width() / 2, t.pageY = n(window).height() / 2 + n(window).scrollTop()) : (t.pageX = r.pageX || r.originalEvent.targetTouches[0].pageX, t.pageY = r.pageY || r.originalEvent.targetTouches[0].pageY);
               u();
               setTimeout(function () {
                  t.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
               }, 10)
            },
            r = !1;
         t.core.$el.on("onAferAppendSlide.lg.tm.zoom", function (n, i) {
            var u = t.core.$slide.eq(i).find(".lg-image");
            u.on("dblclick", function (n) {
               f(n, u, i)
            });
            u.on("touchstart", function (n) {
               r ? (clearTimeout(r), r = null, f(n, u, i)) : r = setTimeout(function () {
                  r = null
               }, 300);
               n.preventDefault()
            })
         });
         n(window).on("resize.lg.zoom scroll.lg.zoom orientationchange.lg.zoom", function () {
            t.pageX = n(window).width() / 2;
            t.pageY = n(window).height() / 2 + n(window).scrollTop();
            o(i)
         });
         n("#lg-zoom-out").on("click.lg", function () {
            t.core.$outer.find(".lg-current .lg-image").length && (i -= t.core.s.scale, u())
         });
         n("#lg-zoom-in").on("click.lg", function () {
            t.core.$outer.find(".lg-current .lg-image").length && (i += t.core.s.scale, u())
         });
         n("#lg-actual-size").on("click.lg", function (n) {
            f(n, t.core.$slide.eq(t.core.index).find(".lg-image"), t.core.index, !0)
         });
         t.core.$el.on("onBeforeSlide.lg.tm", function () {
            i = 1;
            t.resetZoom()
         });
         t.zoomDrag();
         t.zoomSwipe()
      };
      t.prototype.resetZoom = function () {
         this.core.$outer.removeClass("lg-zoomed");
         this.core.$slide.find(".lg-img-wrap").removeAttr("style data-x data-y");
         this.core.$slide.find(".lg-image").removeAttr("style data-scale");
         this.pageX = n(window).width() / 2;
         this.pageY = n(window).height() / 2 + n(window).scrollTop()
      };
      t.prototype.zoomSwipe = function () {
         var n = this,
            t = {},
            i = {},
            f = !1,
            r = !1,
            u = !1;
         n.core.$slide.on("touchstart.lg", function (i) {
            if (n.core.$outer.hasClass("lg-zoomed")) {
               var f = n.core.$slide.eq(n.core.index).find(".lg-object");
               u = f.prop("offsetHeight") * f.attr("data-scale") > n.core.$outer.find(".lg").height();
               r = f.prop("offsetWidth") * f.attr("data-scale") > n.core.$outer.find(".lg").width();
               (r || u) && (i.preventDefault(), t = {
                  x: i.originalEvent.targetTouches[0].pageX,
                  y: i.originalEvent.targetTouches[0].pageY
               })
            }
         });
         n.core.$slide.on("touchmove.lg", function (e) {
            if (n.core.$outer.hasClass("lg-zoomed")) {
               var s, h, o = n.core.$slide.eq(n.core.index).find(".lg-img-wrap");
               e.preventDefault();
               f = !0;
               i = {
                  x: e.originalEvent.targetTouches[0].pageX,
                  y: e.originalEvent.targetTouches[0].pageY
               };
               n.core.$outer.addClass("lg-zoom-dragging");
               h = u ? -Math.abs(o.attr("data-y")) + (i.y - t.y) : -Math.abs(o.attr("data-y"));
               s = r ? -Math.abs(o.attr("data-x")) + (i.x - t.x) : -Math.abs(o.attr("data-x"));
               (Math.abs(i.x - t.x) > 15 || Math.abs(i.y - t.y) > 15) && (n.core.s.useLeftForZoom ? o.css({
                  left: s + "px",
                  top: h + "px"
               }) : o.css("transform", "translate3d(" + s + "px, " + h + "px, 0)"))
            }
         });
         n.core.$slide.on("touchend.lg", function () {
            n.core.$outer.hasClass("lg-zoomed") && f && (f = !1, n.core.$outer.removeClass("lg-zoom-dragging"), n.touchendZoom(t, i, r, u))
         })
      };
      t.prototype.zoomDrag = function () {
         var t = this,
            r = {},
            i = {},
            u = !1,
            o = !1,
            f = !1,
            e = !1;
         t.core.$slide.on("mousedown.lg.zoom", function (i) {
            var o = t.core.$slide.eq(t.core.index).find(".lg-object");
            e = o.prop("offsetHeight") * o.attr("data-scale") > t.core.$outer.find(".lg").height();
            f = o.prop("offsetWidth") * o.attr("data-scale") > t.core.$outer.find(".lg").width();
            t.core.$outer.hasClass("lg-zoomed") && n(i.target).hasClass("lg-object") && (f || e) && (i.preventDefault(), r = {
               x: i.pageX,
               y: i.pageY
            }, u = !0, t.core.$outer.scrollLeft += 1, t.core.$outer.scrollLeft -= 1, t.core.$outer.removeClass("lg-grab").addClass("lg-grabbing"))
         });
         n(window).on("mousemove.lg.zoom", function (n) {
            if (u) {
               var h, c, s = t.core.$slide.eq(t.core.index).find(".lg-img-wrap");
               o = !0;
               i = {
                  x: n.pageX,
                  y: n.pageY
               };
               t.core.$outer.addClass("lg-zoom-dragging");
               c = e ? -Math.abs(s.attr("data-y")) + (i.y - r.y) : -Math.abs(s.attr("data-y"));
               h = f ? -Math.abs(s.attr("data-x")) + (i.x - r.x) : -Math.abs(s.attr("data-x"));
               t.core.s.useLeftForZoom ? s.css({
                  left: h + "px",
                  top: c + "px"
               }) : s.css("transform", "translate3d(" + h + "px, " + c + "px, 0)")
            }
         });
         n(window).on("mouseup.lg.zoom", function (n) {
            u && (u = !1, t.core.$outer.removeClass("lg-zoom-dragging"), !o || r.x === i.x && r.y === i.y || (i = {
               x: n.pageX,
               y: n.pageY
            }, t.touchendZoom(r, i, f, e)), o = !1);
            t.core.$outer.removeClass("lg-grabbing").addClass("lg-grab")
         })
      };
      t.prototype.touchendZoom = function (n, t, i, r) {
         var u = this,
            f = u.core.$slide.eq(u.core.index).find(".lg-img-wrap"),
            s = u.core.$slide.eq(u.core.index).find(".lg-object"),
            e = -Math.abs(f.attr("data-x")) + (t.x - n.x),
            o = -Math.abs(f.attr("data-y")) + (t.y - n.y),
            h = (u.core.$outer.find(".lg").height() - s.prop("offsetHeight")) / 2,
            l = Math.abs(s.prop("offsetHeight") * Math.abs(s.attr("data-scale")) - u.core.$outer.find(".lg").height() + h),
            c = (u.core.$outer.find(".lg").width() - s.prop("offsetWidth")) / 2,
            a = Math.abs(s.prop("offsetWidth") * Math.abs(s.attr("data-scale")) - u.core.$outer.find(".lg").width() + c);
         (Math.abs(t.x - n.x) > 15 || Math.abs(t.y - n.y) > 15) && (r && (o <= -l ? o = -l : o >= -h && (o = -h)), i && (e <= -a ? e = -a : e >= -c && (e = -c)), r ? f.attr("data-y", Math.abs(o)) : o = -Math.abs(f.attr("data-y")), i ? f.attr("data-x", Math.abs(e)) : e = -Math.abs(f.attr("data-x")), u.core.s.useLeftForZoom ? f.css({
            left: e + "px",
            top: o + "px"
         }) : f.css("transform", "translate3d(" + e + "px, " + o + "px, 0)"))
      };
      t.prototype.destroy = function () {
         var t = this;
         t.core.$el.off(".lg.zoom");
         n(window).off(".lg.zoom");
         t.core.$slide.off(".lg.zoom");
         t.core.$el.off(".lg.tm.zoom");
         t.resetZoom();
         clearTimeout(t.zoomabletimeout);
         t.zoomabletimeout = !1
      };
      n.fn.lightGallery.modules.zoom = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            hash: !0
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.core.s = n.extend({}, i, this.core.s), this.core.s.hash && (this.oldHash = window.location.hash, this.init()), this
         };
      t.prototype.init = function () {
         var i, t = this;
         t.core.$el.on("onAfterSlide.lg.tm", function (n, i, r) {
            history.replaceState ? history.replaceState(null, null, window.location.pathname + window.location.search + "#lg=" + t.core.s.galleryId + "&slide=" + r) : window.location.hash = "lg=" + t.core.s.galleryId + "&slide=" + r
         });
         n(window).on("hashchange.lg.hash", function () {
            i = window.location.hash;
            var n = parseInt(i.split("&slide=")[1], 10);
            i.indexOf("lg=" + t.core.s.galleryId) > -1 ? t.core.slide(n, !1, !1) : t.core.lGalleryOn && t.core.destroy()
         })
      };
      t.prototype.destroy = function () {
         this.core.s.hash && (this.oldHash && this.oldHash.indexOf("lg=" + this.core.s.galleryId) < 0 ? history.replaceState ? history.replaceState(null, null, this.oldHash) : window.location.hash = this.oldHash : history.replaceState ? history.replaceState(null, document.title, window.location.pathname + window.location.search) : window.location.hash = "", this.core.$el.off(".lg.hash"))
      };
      n.fn.lightGallery.modules.hash = t
   }()
}),
function (n, t) {
   "function" == typeof define && define.amd ? define(["jquery"], function (n) {
      return t(n)
   }) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}(0, function (n) {
   ! function () {
      "use strict";
      var i = {
            share: !0,
            facebook: !0,
            facebookDropdownText: "Facebook",
            twitter: !0,
            twitterDropdownText: "Twitter",
            googlePlus: !0,
            googlePlusDropdownText: "GooglePlus",
            pinterest: !0,
            pinterestDropdownText: "Pinterest"
         },
         t = function (t) {
            return this.core = n(t).data("lightGallery"), this.core.s = n.extend({}, i, this.core.s), this.core.s.share && this.init(), this
         };
      t.prototype.init = function () {
         var t = this,
            i = '<span id="lg-share" class="lg-icon"><ul class="lg-dropdown" style="position: absolute;">';
         i += t.core.s.facebook ? '<li><a id="lg-share-facebook" target="_blank"><span class="lg-icon"><\/span><span class="lg-dropdown-text">' + this.core.s.facebookDropdownText + "<\/span><\/a><\/li>" : "";
         i += t.core.s.twitter ? '<li><a id="lg-share-twitter" target="_blank"><span class="lg-icon"><\/span><span class="lg-dropdown-text">' + this.core.s.twitterDropdownText + "<\/span><\/a><\/li>" : "";
         i += t.core.s.googlePlus ? '<li><a id="lg-share-googleplus" target="_blank"><span class="lg-icon"><\/span><span class="lg-dropdown-text">' + this.core.s.googlePlusDropdownText + "<\/span><\/a><\/li>" : "";
         i += t.core.s.pinterest ? '<li><a id="lg-share-pinterest" target="_blank"><span class="lg-icon"><\/span><span class="lg-dropdown-text">' + this.core.s.pinterestDropdownText + "<\/span><\/a><\/li>" : "";
         i += "<\/ul><\/span>";
         this.core.$outer.find(".lg-toolbar").append(i);
         this.core.$outer.find(".lg").append('<div id="lg-dropdown-overlay"><\/div>');
         n("#lg-share").on("click.lg", function () {
            t.core.$outer.toggleClass("lg-dropdown-active")
         });
         n("#lg-dropdown-overlay").on("click.lg", function () {
            t.core.$outer.removeClass("lg-dropdown-active")
         });
         t.core.$el.on("onAfterSlide.lg.tm", function (i, r, u) {
            setTimeout(function () {
               n("#lg-share-facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(t.getSahreProps(u, "facebookShareUrl") || window.location.href));
               n("#lg-share-twitter").attr("href", "https://twitter.com/intent/tweet?text=" + t.getSahreProps(u, "tweetText") + "&url=" + encodeURIComponent(t.getSahreProps(u, "twitterShareUrl") || window.location.href));
               n("#lg-share-googleplus").attr("href", "https://plus.google.com/share?url=" + encodeURIComponent(t.getSahreProps(u, "googleplusShareUrl") || window.location.href));
               n("#lg-share-pinterest").attr("href", "http://www.pinterest.com/pin/create/button/?url=" + encodeURIComponent(t.getSahreProps(u, "pinterestShareUrl") || window.location.href) + "&media=" + encodeURIComponent(t.getSahreProps(u, "src")) + "&description=" + t.getSahreProps(u, "pinterestText"))
            }, 100)
         })
      };
      t.prototype.getSahreProps = function (n, t) {
         var i = "",
            u, r;
         return this.core.s.dynamic ? i = this.core.s.dynamicEl[n][t] : (u = this.core.$items.eq(n).attr("href"), r = this.core.$items.eq(n).data(t), i = "src" === t ? u || r : r), i
      };
      t.prototype.destroy = function () {};
      n.fn.lightGallery.modules.share = t
   }()
});
$(document).ready(function () {
   $(".lightgallery").lightGallery({
      thumbnail: !0,
      animateThumb: !1,
      showThumbByDefault: !1,
      pager: !0,
      share: !1,
      download: !1,
      selector: "a"
   });
   $(".loc").lightGallery({
      thumbnail: !0,
      animateThumb: !1,
      showThumbByDefault: !1,
      pager: !0,
      share: !1,
      download: !1,
      selector: "a"
   });
   $("#floor").lightGallery({
      thumbnail: !1,
      pager: !0,
      share: !1,
      download: !1,
      showThumbByDefault: !1,
      selector: "a"
   });
   $(".gallery_sec").lightGallery({
      thumbnail: !0,
      animateThumb: !1,
      showThumbByDefault: !1,
      pager: !0,
      share: !1,
      download: !1,
      selector: "a"
   })
});
$(document).ready(function () {
   var n = function (n, t, i) {
      var r = n.outerHeight(),
         u = t.offset().top;
      i.scrollTop() >= u ? (t.height(r), n.addClass("is-sticky")) : (n.removeClass("is-sticky"), t.height("auto"))
   };
   $('[data-toggle="sticky-onscroll"]').each(function () {
      var t = $(this),
         i = $("<div>").addClass("sticky-wrapper");
      t.before(i);
      t.addClass("sticky");
      $(window).on("scroll.sticky-onscroll resize.sticky-onscroll", function () {
         n(t, i, $(this))
      });
      n(t, i, $(window))
   })
});
$(window).on("scroll", function () {
   $(this).scrollTop() > 100 ? $(".back_top_angle_up").fadeIn() : $(".back_top_angle_up").fadeOut()
});
$(".back_top_angle_up").on("click", function () {
   return $("html, body").animate({
      scrollTop: 0
   }, 1e3), !1
});
(function (n) {
   if (typeof define == "function" && define.amd) define(n);
   else if (typeof exports == "object") module.exports = n();
   else {
      var i = window.Cookies,
         t = window.Cookies = n();
      t.noConflict = function () {
         return window.Cookies = i, t
      }
   }
})(function () {
   function n() {
      for (var n = 0, r = {}, t, i; n < arguments.length; n++) {
         t = arguments[n];
         for (i in t) r[i] = t[i]
      }
      return r
   }

   function t(i) {
      function r(t, u, f) {
         var o, h, l, e, s;
         if (typeof document != "undefined") {
            if (arguments.length > 1) {
               f = n({
                  path: "/"
               }, r.defaults, f);
               typeof f.expires == "number" && (h = new Date, h.setMilliseconds(h.getMilliseconds() + f.expires * 864e5), f.expires = h);
               try {
                  o = JSON.stringify(u);
                  /^[\{\[]/.test(o) && (u = o)
               } catch (y) {}
               return u = i.write ? i.write(u, t) : encodeURIComponent(String(u)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), t = encodeURIComponent(String(t)), t = t.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent), t = t.replace(/[\(\)]/g, escape), document.cookie = [t, "=", u, f.expires ? "; expires=" + f.expires.toUTCString() : "", f.path ? "; path=" + f.path : "", f.domain ? "; domain=" + f.domain : "", f.secure ? "; secure" : ""].join("")
            }
            t || (o = {});
            for (var a = document.cookie ? document.cookie.split("; ") : [], v = /(%[0-9A-Z]{2})+/g, c = 0; c < a.length; c++) {
               l = a[c].split("=");
               e = l.slice(1).join("=");
               e.charAt(0) === '"' && (e = e.slice(1, -1));
               try {
                  if (s = l[0].replace(v, decodeURIComponent), e = i.read ? i.read(e, s) : i(e, s) || e.replace(v, decodeURIComponent), this.json) try {
                     e = JSON.parse(e)
                  } catch (y) {}
                  if (t === s) {
                     o = e;
                     break
                  }
                  t || (o[s] = e)
               } catch (y) {}
            }
            return o
         }
      }
      return r.set = r, r.get = function (n) {
         return r(n)
      }, r.getJSON = function () {
         return r.apply({
            json: !0
         }, [].slice.call(arguments))
      }, r.defaults = {}, r.remove = function (t, i) {
         r(t, "", n(i, {
            expires: -1
         }))
      }, r.withConverter = t, r
   }
   return t(function () {})
}),
function (n, t) {
   typeof define == "function" && define.amd ? define(function () {
      return t(n)
   }) : typeof exports == "object" ? module.exports = t : n.echo = t(n)
}(this, function (n) {
   "use strict";
   var t = {},
      f = function () {},
      r, u, o, s, e, h = function (n) {
         return n.offsetParent === null
      },
      c = function (n, t) {
         if (h(n)) return !1;
         var i = n.getBoundingClientRect();
         return i.right >= t.l && i.bottom >= t.t && i.left <= t.r && i.top <= t.b
      },
      i = function () {
         (s || !u) && (clearTimeout(u), u = setTimeout(function () {
            t.render();
            u = null
         }, o))
      };
   return t.init = function (u) {
      u = u || {};
      var c = u.offset || 0,
         l = u.offsetVertical || c,
         a = u.offsetHorizontal || c,
         h = function (n, t) {
            return parseInt(n || t, 10)
         };
      r = {
         t: h(u.offsetTop, l),
         b: h(u.offsetBottom, l),
         l: h(u.offsetLeft, a),
         r: h(u.offsetRight, a)
      };
      o = h(u.throttle, 250);
      s = u.debounce !== !1;
      e = !!u.unload;
      f = u.callback || f;
      t.render();
      document.addEventListener ? (n.addEventListener("scroll", i, !1), n.addEventListener("load", i, !1)) : (n.attachEvent("onscroll", i), n.attachEvent("onload", i))
   }, t.render = function (i) {
      for (var h = (i || document).querySelectorAll("[data-echo], [data-echo-background]"), l = h.length, o, u, a = {
            l: 0 - r.l,
            t: 0 - r.t,
            b: (n.innerHeight || document.documentElement.clientHeight) + r.b,
            r: (n.innerWidth || document.documentElement.clientWidth) + r.r
         }, s = 0; s < l; s++) u = h[s], c(u, a) ? (e && u.setAttribute("data-echo-placeholder", u.src), u.getAttribute("data-echo-background") !== null ? u.style.backgroundImage = "url(" + u.getAttribute("data-echo-background") + ")" : u.src !== (o = u.getAttribute("data-echo")) && (u.src = o), e || (u.removeAttribute("data-echo"), u.removeAttribute("data-echo-background")), f(u, "load")) : e && !!(o = u.getAttribute("data-echo-placeholder")) && (u.getAttribute("data-echo-background") !== null ? u.style.backgroundImage = "url(" + o + ")" : u.src = o, u.removeAttribute("data-echo-placeholder"), f(u, "unload"));
      l || t.detach()
   }, t.detach = function () {
      document.removeEventListener ? n.removeEventListener("scroll", i) : n.detachEvent("onscroll", i);
      clearTimeout(u)
   }, t
});
echo.init();
$("#lnkbtnAE1").mousedown(function (n) {
   var t = $("#hdnProjNameAR").val().trim(),
      i = $("#hdnPageName").val().trim();
   switch (n.which) {
      case 1:
         $.ajax({
            type: "POST",
            url: "/Projects/GetBrochure.aspx/SetArabicURL",
            data: '{"strProjNameAR": "' + t + '", "strPageName": "' + i + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (n) {
               n.d.length > 0 && (window.location.href = n.d)
            },
            failure: function () {
               window.location.href = "https://tanamiproperties.com/"
            },
            error: function () {
               window.location.href = "https://tanamiproperties.com/"
            }
         });
         break;
      case 3:
         $.ajax({
            type: "POST",
            url: "/Projects/GetBrochure.aspx/SetArabicURL",
            data: '{"strProjNameAR": "' + t + '", "strPageName": "' + i + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (n) {
               n.d.length > 0 && $("#lnkbtnAE1").attr("href", n.d)
            },
            failure: function () {
               window.location.href = "https://tanamiproperties.com/"
            },
            error: function () {
               window.location.href = "https://tanamiproperties.com/"
            }
         });
         break;
      default:
         $.ajax({
            type: "POST",
            url: "/Projects/GetBrochure.aspx/SetArabicURL",
            data: '{"strProjNameAR": "' + t + '", "strPageName": "' + i + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (n) {
               n.d.length > 0 && (window.location.href = n.d)
            },
            failure: function () {
               window.location.href = "https://tanamiproperties.com/"
            },
            error: function () {
               window.location.href = "https://tanamiproperties.com/"
            }
         })
   }
})