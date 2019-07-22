$(document).ready(function() {
  $('[data-toggle="offcanvas"]').click(function() {
    $("#side-menu").toggleClass("hidden-xs");
  });

  navigator.getBattery().then(function(battery) {
    function updateAllBatteryInfo() {
      updateChargeInfo();
      updateLevelInfo();
      updateChargingInfo();
      updateDischargingInfo();
    }
    updateAllBatteryInfo();

    battery.addEventListener("chargingchange", function() {
      updateChargeInfo();
    });
    function updateChargeInfo() {
      //console.log("Battery charging? " + (battery.charging ? "Yes" : "No"));
      //   console.log(battery.charging ? "charging" : "Not Charging");

      $("#charge_Status").html(battery.charging ? "Charging" : "Not Charging");
    }

    battery.addEventListener("levelchange", function() {
      updateLevelInfo();
    });
    function updateLevelInfo() {
      //   console.log("Battery level: " + battery.level * 100 + "%");
      //   console.log("Battery level: " + battery.level * 100);
      //var element = document.getElementById("percent");
      $("#percent").removeAttr("class");
      $("#percent").attr("class", "c100 " + "p" + battery.level * 100);
      $("#percent_txt").html(battery.level * 100 + "%");
    }

    battery.addEventListener("chargingtimechange", function() {
      updateChargingInfo();
    });
    function updateChargingInfo() {
      //   console.log(
      //     "Battery charging time: " + battery.chargingTime + " seconds"
      //   );
    }

    battery.addEventListener("dischargingtimechange", function() {
      updateDischargingInfo();
    });
    function updateDischargingInfo() {
      //   console.log(
      //     "Battery discharging time: " + battery.dischargingTime + " seconds"
      //   );
    }
  });
});
