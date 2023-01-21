function toggleShow(element) {
    console.log(element.style);
    if (element.style.display === "") {
        element.style.display = "block";
    } else if (element.style.display === "block") {
        element.style.display = "none";
    } else {
        element.style.display = "block";
    }
}

function toggleShowFlex(element) {
    console.log(element.style);
    if (element.style.display === "") {
        element.style.display = "flex";
    } else if (element.style.display === "flex") {
        element.style.display = "none";
    } else {
        element.style.display = "flex";
    } 
}

$("#addCPUForm").submit(function () {
    event.preventDefault();
    const obj = { id: $("#cpuId").val(), manufacturer_id: $("#cpuManufacturer").val(), model: $("#cpuModel").val(), coreClock: $("#cpuCoreClock").val(), coreCount: $("#cpuCoreCount").val(), tdp: $("#cpuTDP").val(), socket_id: $("#cpuSocket").val(), memoryType_id: $("#cpuMemoryType").val()};
    const manufacturerName = $("#cpuManufacturer option:selected").text();
    const socket = $("#cpuSocket option:selected").text();
    const memoryType = $("#cpuMemoryType option:selected").text();
    console.log(obj);
    const request = $.ajax({
      url: "handler/addCPU.php",
      type: "post",
      data: obj
    });
  
    request.done(function (response) {
      if (response == "Success") {
        updateViewAfterAddCPU(obj, manufacturerName, socket, memoryType);
      } else console.log("CPU nije dodat: " + response);
    });
  });

function updateViewAfterAddCPU(obj, manufacturerName, socket, memoryType) {
    $("#selectCPU").append($('<option>', {
        text: manufacturerName + ' ' + obj.model + ' ' + obj.coreClock + ' MHz ' + obj.coreCount + '-Core ' + obj.tdp + 'W ' + socket + ' ' + memoryType
    }));
}

$("#addGPUForm").submit(function () {
    event.preventDefault();
    const obj = { id: $("#gpuId").val(), manufacturer_id: $("#gpuManufacturer").val(), model: $("#gpuModel").val(), memory: $("#gpuMemory").val(), coreClock: $("#gpuCoreClock").val(), memoryClock: $("#gpuMemoryClock").val(), tdp: $("#gpuTdp").val()};
    const manufacturerName = $("#gpuManufacturer option:selected").text();
    console.log(obj);
    const request = $.ajax({
      url: "handler/addGPU.php",
      type: "post",
      data: obj
    });
  
    request.done(function (response) {
      if (response == "Success") {
        updateViewAfterAddGPU(obj, manufacturerName);
      } else console.log("GPU nije dodat: " + response);
    });
  });

function updateViewAfterAddGPU(obj, manufacturerName) {
    $("#selectGPU").append($('<option>', {
        text: manufacturerName + ' ' + obj.model + ' ' + obj.memory + ' GB ' + obj.coreClock + ' MHz Core ' + obj.memoryClock + ' MHz Memory ' + obj.tdp + 'W'
    }));
}

$("#addMotherboardForm").submit(function () {
    event.preventDefault();
    const obj = { id: $("#moboId").val(), manufacturer_id: $("#moboManufacturer").val(), model: $("#moboModel").val(), formFactor: $("#moboFormFactor").val(), socket_id: $("#moboSocket").val(), memoryType_id: $("#moboMemoryType").val(), memorySlots: $("#moboMemorySlots").val(), maxMemory: $("#moboMaxMemory").val()};
    const manufacturerName = $("#moboManufacturer option:selected").text();
    const socket = $("#moboSocket option:selected").text();
    const memoryType = $("#moboMemoryType option:selected").text();
    console.log(obj);
    const request = $.ajax({
      url: "handler/addMotherboard.php",
      type: "post",
      data: obj
    });
  
    request.done(function (response) {
      if (response == "Success") {
        updateViewAfterAddMotherboard(obj, manufacturerName, socket, memoryType);
      } else console.log("MOBO nije dodat: " + response);
    });
  });

function updateViewAfterAddMotherboard(obj, manufacturerName, socket, memoryType) {
    $("#selectMotherboard").append($('<option>', {
        text: manufacturerName + ' ' + obj.model + ' ' + obj.formFactor + ' ' + socket + ' ' + memoryType + ' ' + obj.memorySlots + ' ' + obj.maxMemory
    }));
}

$("#addRAMForm").submit(function () {
    event.preventDefault();
    const obj = { id: $("#ramId").val(), manufacturer_id: $("#ramManufacturer").val(), model: $("#ramModel").val(), memory: $("#ramMemory").val(), modules: $("#ramModules").val(), tdp: $("#cpuTDP").val(), memorySpeed: $("#ramSpeed").val(), memoryType_id: $("#ramMemoryType").val()};
    const manufacturerName = $("#ramManufacturer option:selected").text();
    const memoryType = $("#ramMemoryType option:selected").text();
    console.log(obj);
    const request = $.ajax({
      url: "handler/addRAM.php",
      type: "post",
      data: obj
    });
  
    request.done(function (response) {
      if (response == "Success") {
        updateViewAfterAddRAM(obj, manufacturerName, memoryType);
      } else console.log("RAM nije dodat: " + response);
    });
  });

function updateViewAfterAddRAM(obj, manufacturerName, memoryType) {
    $("#selectRAM").append($('<option>', {
        text: manufacturerName + ' ' + obj.model + ' ' + obj.memory + ' GB ' + obj.modules + ' Sticks ' + obj.memorySpeed + ' MHz ' + memoryType
    }));
}

$("#removeButton").on("click", function (){
    const value = $("#removeList").val();
    console.log(value);
    const res = value.split(":");
    console.log(res);
    request = $.ajax({
        url: "handler/deleteComponent.php",
        type: "post",
        data: { id: res[1], tableName: res[0] },
        });
        request.done(function (response) {
        if (response == "Success") {
        } else {
            alert("Brisanje reda u tabeli: Neuspesno");
        }
    });
})