<?php
require "dbBroker.php";
require "model/cpu.php";
require "model/gpu.php";
require "model/manufacturer.php";
require "model/memory_type.php";
require "model/motherboard.php";
require "model/ram.php";
require "model/socket.php";

$result;
$memoryTypeList = array();
$socketList = array();
$manufacturerList = array();
$cpuList = array();
$motherboardList = array();
$ramList = array();
$gpuList = array();

$result = MemoryType::getAll($conn);
while ($memoryTypeRow = $result->fetch_array()) {
    $memoryTypeList[] = $memoryTypeRow;
}

$result = Socket::getAll($conn);
while ($socketRow = $result->fetch_array()) {
    $socketList[] = $socketRow;
}

$result = Manufacturer::getAll($conn);
while ($manufacturerRow = $result->fetch_array()) {
    $manufacturerList[] = $manufacturerRow;
}

$result = CPU::getAll($conn);
while ($cpuRow = $result->fetch_array()) {
    $cpuList[] = $cpuRow;
}

$result = Motherboard::getAll($conn);
while ($motherboardRow = $result->fetch_array()) {
    $motherboardList[] = $motherboardRow;
}

$result = RAM::getAll($conn);
while ($ramRow = $result->fetch_array()) {
    $ramList[] = $ramRow;
}

$result = GPU::getAll($conn);
while ($gpuRow = $result->fetch_array()) {
    $gpuList[] = $gpuRow;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css"> 
    <title>PC Builder</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>
                    Component
                </th>
                <th>
                    Selection
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    CPU
                </td>
                <td>
                    <select class="select">
                        <?php
                        foreach ($cpuList as $cpu) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $cpu["manufacturer_id"]) {
                                    $cpu["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                            foreach ($socketList as $socket) {
                                if ($socket["id"] == $cpu["socket_id"]) {
                                    $cpu["socketName"] = $socket["name"];
                                    break;
                                }
                            }
                            foreach ($memoryTypeList as $memoryType) {
                                if ($memoryType["id"] == $cpu["memoryType_id"]) {
                                    $cpu["memoryTypeName"] = $memoryType["name"];
                                    break;
                                }
                            }
                        ?>
                        <option><?php echo "$cpu[manufacturerName] $cpu[model] $cpu[coreClock] GHz $cpu[coreCount]-Core $cpu[tdp]W $cpu[socketName] $cpu[memoryTypeName]" ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Motherboard
                </td>
                <td>
                    <select class="select">
                    <?php
                        foreach ($motherboardList as $motherboard) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $motherboard["manufacturer_id"]) {
                                    $motherboard["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                            foreach ($socketList as $socket) {
                                if ($socket["id"] == $motherboard["socket_id"]) {
                                    $motherboard["socketName"] = $socket["name"];
                                    break;
                                }
                            }
                            foreach ($memoryTypeList as $memoryType) {
                                if ($memoryType["id"] == $motherboard["memoryType_id"]) {
                                    $motherboard["memoryTypeName"] = $memoryType["name"];
                                    break;
                                }
                            }
                        ?>
                        <option><?php echo "$motherboard[manufacturerName] $motherboard[model] $motherboard[formFactor] $motherboard[socketName] $motherboard[memoryTypeName] $motherboard[memorySlots] RAM Slots $motherboard[maxMemory] GB" ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    RAM
                </td>
                <td>
                    <select class="select">
                    <?php
                        foreach ($ramList as $ram) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $ram["manufacturer_id"]) {
                                    $ram["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                            foreach ($memoryTypeList as $memoryType) {
                                if ($memoryType["id"] == $ram["memoryType_id"]) {
                                    $ram["memoryTypeName"] = $memoryType["name"];
                                    break;
                                }
                            }
                        ?>
                        <option><?php echo "$ram[manufacturerName] $ram[model] $ram[memory] GB $ram[modules] Sticks $ram[memorySpeed] MHz $ram[memoryTypeName]" ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    GPU
                </td>
                <td>
                    <select class="select">
                    <?php
                        foreach ($gpuList as $gpu) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $gpu["manufacturer_id"]) {
                                    $gpu["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                        ?>
                        <option><?php echo "$gpu[manufacturerName] $gpu[model] $gpu[memory] GB $gpu[coreClock] MHz Core $gpu[memoryClock] MHz Memory $gpu[tdp]W" ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="buttonGroup">
        <button onclick="toggleShow(document.getElementById('modal')); toggleShow(document.getElementById('backdrop'))">Add component</button>
        <button onclick="toggleShow(document.getElementById('wrapperRemove')); toggleShow(document.getElementById('backdrop'))">Remove component</button>
    </div>

    <div class="backdrop" id="backdrop"></div>

    <div id="modal">
        <div class="wrapper2">
        <button onclick="toggleShowFlex(document.getElementById('wrapper')); toggleShow(document.getElementById('modal'))">CPU</button>
        <button onclick="toggleShowFlex(document.getElementById('wrapperMobo')); toggleShow(document.getElementById('modal'))">Motherboard</button>
        <button onclick="toggleShowFlex(document.getElementById('wrapperRAM')); toggleShow(document.getElementById('modal'))">RAM</button>
        <button onclick="toggleShowFlex(document.getElementById('wrapperGPU')); toggleShow(document.getElementById('modal'))">GPU</button>
        </div>
    </div>

    <div class="wrapper" id="wrapper">
    <form class="addCPUForm" id="addCPUForm">
        <div class="FormGroup">
            <label class="FormLabel">ID:</label>
            <input type="number" name="cpuId" id="cpuId">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Manufacturer:</label>
        <select name="cpuManufacturer" id="cpuManufacturer">
            <?php
                foreach ($manufacturerList as $manufacturer) {
                ?>
                <option><?php echo $manufacturer["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Model:</label>
            <input type="text" name="cpuModel" id="cpuModel">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Core clock:</label>
            <input type="number" name="cpuCoreClock" id="cpuCoreClock">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Core count:</label>
            <input type="text" name="cpuCoreCount" id="cpuCoreCount">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">TDP:</label>
            <input type="text" name="cpuTDP" id="cpuTDP">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Socket:</label>
        <select name="cpuSocket" id="cpuSocket">
            <?php
                foreach ($socketList as $socket) {
                ?>
                <option><?php echo $socket["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory type:</label>
        <select name="cpuMemoryType" id="cpuMemoryType">
            <?php
                foreach ($memoryTypeList as $memoryType) {
                ?>
                <option><?php echo $memoryType["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <button id="saveComponentButton" type="button" onclick="toggleShowFlex(document.getElementById('wrapper')); toggleShow(document.getElementById('backdrop'))">Save component</button>
        </div>
    </form>
    

    <div class="wrapper" id="wrapperMobo">
    <form class="addMotherboardForm" id="addMotherboardForm">
    <div class="FormGroup">
            <label class="FormLabel">ID:</label>
            <input type="number" name="moboId" id="moboId">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Manufacturer:</label>
        <select name="moboManufacturer" id="moboManufacturer">
            <?php
                foreach ($manufacturerList as $manufacturer) {
                ?>
                <option><?php echo $manufacturer["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Model:</label>
            <input type="text" name="moboModel" id="moboModel">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Form factor:</label>
            <input type="text" name="moboFormFactor" id="moboFormFactor">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Socket:</label>
            <select name="moboMemoryType" id="moboMemoryType">
            <?php
                foreach ($socketList as $socket) {
                ?>
                <option><?php echo $socket["name"] ?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory type:</label>
            <select name="moboMemoryType" id="moboMemoryType">
            <?php
                foreach ($memoryTypeList as $memoryType) {
                ?>
                <option><?php echo $memoryType["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory slots:</label>
            <input type="text" name="moboMemorySlots" id="moboMemorySlots">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Max memory:</label>
            <input type="text" name="moboMaxMemory" id="moboMaxMemory">
        </div>
        <button id="saveComponentButton" type="button" onclick="toggleShowFlex(document.getElementById('wrapperMobo')); toggleShow(document.getElementById('backdrop'))">Save component</button>
        
    </div>
    </form>
    
    <div class="wrapper" id="wrapperRAM">
        <form class="addRAMForm" id="addRAMForm">
        <div class="FormGroup">
            <label class="FormLabel">ID:</label>
            <input type="number" name="ramId" id="ramId">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Manufacturer:</label>
        <select name="ramManufacturer" id="ramManufacturer">
            <?php
                foreach ($manufacturerList as $manufacturer) {
                ?>
                <option><?php echo $manufacturer["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Model:</label>
            <input type="text" name="ramModel" id="ramModel">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory:</label>
            <input type="text" name="ramMemory" id="ramMemory">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Modules:</label>
            <input type="text" name="ramModules" id="ramModules">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory speed:</label>
            <input type="text" name="ramSpeed" id="ramSpeed">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory type:</label>
            <select name="moboMemoryType" id="moboMemoryType">
            <?php
                foreach ($memoryTypeList as $memoryType) {
                ?>
                <option><?php echo $memoryType["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        
        <button id="saveComponentButton" type="button" onclick="toggleShowFlex(document.getElementById('wrapperRAM')); toggleShow(document.getElementById('backdrop'))">Save component</button>
        
    </div>
    </form>
    
    <div class="wrapper" id="wrapperGPU">
        <form class="addGPUForm" id="addGPUForm">
        <div class="FormGroup">
            <label class="FormLabel">ID:</label>
            <input type="number" name="gpuId" id="gpuId">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Manufacturer:</label>
        <select name="gpuManufacturer" id="gpuManufacturer">
            <?php
                foreach ($manufacturerList as $manufacturer) {
                ?>
                <option><?php echo $manufacturer["name"] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Model:</label>
            <input type="text" name="gpuModel" id="gpuModel">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory:</label>
            <input type="text" name="gpuMemory" id="gpuMemory">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Core clock:</label>
            <input type="text" name="gpuCoreClock" id="gpuCoreClock">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">Memory clock:</label>
            <input type="text" name="gpuMemoryClock" id="gpuMemoryClock">
        </div>
        <div class="FormGroup">
            <label class="FormLabel">TDP:</label>
            <input type="text" name="gpuTdp" id="gpuTdp">
        </div>
        
        <button id="saveComponentButton" type="button" onclick="toggleShowFlex(document.getElementById('wrapperGPU')); toggleShow(document.getElementById('backdrop'))">Save component</button>
        
    </div>
    </form>

    <div class="wrapper" id="wrapperRemove">
        <div class="wrapper2">
        <select name="removeList" id="removeList">
        <?php
            foreach ($cpuList as $cpu) {
                foreach ($manufacturerList as $manufacturer) {
                    if ($manufacturer["id"] == $cpu["manufacturer_id"]) {
                        $cpu["manufacturerName"] = $manufacturer["name"];
                        break;
                    }
                }
                foreach ($socketList as $socket) {
                    if ($socket["id"] == $cpu["socket_id"]) {
                        $cpu["socketName"] = $socket["name"];
                        break;
                    }
                }
                foreach ($memoryTypeList as $memoryType) {
                    if ($memoryType["id"] == $cpu["memoryType_id"]) {
                        $cpu["memoryTypeName"] = $memoryType["name"];
                        break;
                    }
                }
            ?>
            <option id="cpu:<?php echo "$cpu[id]" ?>"><?php echo "$cpu[manufacturerName] $cpu[model] $cpu[coreClock] GHz $cpu[coreCount]-Core $cpu[tdp]W $cpu[socketName] $cpu[memoryTypeName]" ?></option>
            <?php
            }
            ?>
        <?php
                        foreach ($motherboardList as $motherboard) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $motherboard["manufacturer_id"]) {
                                    $motherboard["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                            foreach ($socketList as $socket) {
                                if ($socket["id"] == $motherboard["socket_id"]) {
                                    $motherboard["socketName"] = $socket["name"];
                                    break;
                                }
                            }
                            foreach ($memoryTypeList as $memoryType) {
                                if ($memoryType["id"] == $motherboard["memoryType_id"]) {
                                    $motherboard["memoryTypeName"] = $memoryType["name"];
                                    break;
                                }
                            }
                        ?>
                        <option id="mobo:<?php echo "$motherboard[id]" ?>"><?php echo "$motherboard[manufacturerName] $motherboard[model] $motherboard[formFactor] $motherboard[socketName] $motherboard[memoryTypeName] $motherboard[memorySlots] RAM Slots $motherboard[maxMemory] GB" ?></option>
                        <?php
                        }
                        ?>
        <?php
                        foreach ($ramList as $ram) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $ram["manufacturer_id"]) {
                                    $ram["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                            foreach ($memoryTypeList as $memoryType) {
                                if ($memoryType["id"] == $ram["memoryType_id"]) {
                                    $ram["memoryTypeName"] = $memoryType["name"];
                                    break;
                                }
                            }
                        ?>
                        <option id="ram:<?php echo "$ram[id]" ?>"><?php echo "$ram[manufacturerName] $ram[model] $ram[memory] GB $ram[modules] Sticks $ram[memorySpeed] MHz $ram[memoryTypeName]" ?></option>
                        <?php
                        }
                        ?>
        <?php
                        foreach ($gpuList as $gpu) {
                            foreach ($manufacturerList as $manufacturer) {
                                if ($manufacturer["id"] == $gpu["manufacturer_id"]) {
                                    $gpu["manufacturerName"] = $manufacturer["name"];
                                    break;
                                }
                            }
                        ?>
                        <option id="gpu:<?php echo "$gpu[id]" ?>"><?php echo "$gpu[manufacturerName] $gpu[model] $gpu[memory] GB $gpu[coreClock] MHz Core $gpu[memoryClock] MHz Memory $gpu[tdp]W" ?></option>
                        <?php
                        }
                        ?>
        </select>
        <button>Remove</button>
        </div>
    </div>
</body>
<script src="js/main.js"></script>
</html>