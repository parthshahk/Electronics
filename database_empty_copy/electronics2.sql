-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 06:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` text,
  `Email` text,
  `Mob` bigint(20) DEFAULT NULL,
  `Message` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Full Name` text,
  `Short Name` text,
  `Original Price` int(11) DEFAULT NULL,
  `Selling Price` int(11) DEFAULT NULL,
  `Description` text,
  `Specifications` text,
  `Kit Contents` text,
  `Category` text,
  `Featured` int(1) DEFAULT NULL,
  `Homepage` int(1) DEFAULT NULL,
  `Image Count` int(1) DEFAULT NULL,
  `Stock Status` int(1) DEFAULT NULL,
  `File Availability` smallint(6) DEFAULT NULL,
  `Deprecated` smallint(6) DEFAULT NULL,
  `Tags` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Full Name`, `Short Name`, `Original Price`, `Selling Price`, `Description`, `Specifications`, `Kit Contents`, `Category`, `Featured`, `Homepage`, `Image Count`, `Stock Status`, `File Availability`, `Deprecated`, `Tags`) VALUES
(1, '5V Adaptor', '5V Adaptor', 150, 140, 'Supply cable is generally use to power up the arduino directly from AC supply. Its output is 5V 2 AMP which is enough to hold the circuitary connected with arduino.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, '5v adaptor charger power supply'),
(2, 'Heat Sink', 'Heat Sink', 15, 10, 'Heat Sink a component to absorb or to transmit the extra heat produced by the circuit. It is present onto the L298D module, which deals with 2 amp current and needs protection from heat. While working with high power circuits, heat sink must be present to avoid damage.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'heat sink'),
(3, 'Banana Pins', 'Banana Pins', 20, 10, 'Banana pins are generally used when the connections are to be made with experiment board. Thus they are very handy while experimenting with it.', '-', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, 'banana pins connection board'),
(4, 'Crocodile Pins', 'Crocodile Pins', 20, 10, 'Crocodile pins has various uses. It helps to connect two junction and to hold it strongly. The pin are connected with each other by channel of conecting wires(single core).', '-', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, 'crocodile pins cro probes'),
(5, 'Lithium LiPo RC Battery Balance Charger', 'LiPo Charger', 650, 630, 'It is a smart Balance Charger for 2 and 3 cell lithium polymer battery. It works on 110 to 230V AC. It can be used to charge any 2 or 3 cell Lithium Polymer battery which can sustain continuous charging at 600mA to 800mA.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'lithium battery charger lipo'),
(6, 'Buzzer', 'Buzzer', 25, 15, 'A buzzer or beeper is an audio signaling device which may be mechanical, electromechanical, or piezoelectric. Typical uses of buzzers and beepers include alarm devices, timers, and confirmation of user input such as a mouse click or keystroke.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'buzzer beeper speaker audio signal'),
(7, 'Glue Gun', 'Glue Gun', 325, 290, 'Heat up in 1-2 min; Maintains constant temperature automatically making it an ideal adhesive for projects including metal, wood, glass, card, fabric, plastic, ceramics and so on.', '-', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, 'glue gun adhesive'),
(8, 'On/Off Switch', 'On/Off Switch', 20, 10, 'High quality switch compatible with your project.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'switch switches'),
(9, 'DMM Wires', 'DMM Wires', 90, 60, 'High Quality and cost competitive component for safe use. For experimental use and lab work. Easy to use and durable for long lasting use.', '-', '-', 'Basic Components', 0, 1, 1, 1, 0, 0, 'dmm wires multimeter digital wire'),
(10, 'Female to Female Jumper Pins (10 Unit)', 'F to F Jumper Pins', 50, 30, 'Female to female jumper cables of different colors.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'female jumper f2f cables wires wire ftof cable'),
(11, '4X4 Universal 16 Key Switch Keypad', 'Switch Keypad', 110, 100, 'It is solidly built, reasonably flexible and an all round good product. Works perfectly with arduino and can be inserted in the pin connection circuit.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'switch key keypad keys'),
(12, '16 X 2 LCD Display Module for Micro Controllers', '16 X 2 LCD Display', 145, 135, 'Brand new and high quality LCD display module with green blacklight. Opn product page for technical details.', 'Brand new and high quality.*LCD display module with green blacklight.*Wide viewing angle and high contrast.*Built-in industry standard HD44780.*Equivalent LCD controller.*Commonly used with : arduino uno, mega, nano, atmel controllers and 8051 controllers.*LCM type: Characters.*Can display 2-lines X 16 Characters.*Operate with 5V DC.', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, '16X2 LCD display'),
(13, 'RS232 Cable 9 Pin Female to Female + Connectors 2 Units', 'RS232 Cable', 100, 50, 'This cable is available as cable to build by yourself. You have to solder female pin connector at the end of cable to use it.', 'DB9 female connectors on each end.*Straight through(not a null modem cable).*ROHS complaint.', '2 Female Connectors.*3 Core cable of 1 meter length', 'Basic Components', 0, 0, 2, 0, 0, 0, 'RS232 ftf connector'),
(14, 'JoyStick Module', 'JoyStick', 200, 180, 'PS2 joystick joysticks standard interface module electronic building blocks and 2.54mm pin interface leads.', '-', '-', 'Basic Components', 0, 0, 2, 1, 0, 0, 'joystick'),
(15, '555 Timer IC', '555 Timer IC', 20, 7, 'This is a common 555 timer/oscillator from TI. A classic for all of those circuits projects where you need to blink a LED, generate a tone, and thousands of other great beginning projects.', '4.5V to 16V supply.*8-Pin DIP package.*Timing from microseconds to hours.*A stable or monostable operation.*Adjustable duty cycle.*TTL compatible output.*Sink or Source up to 200mA.', '-', 'IC', 0, 0, 1, 1, 0, 0, '555 timer ic'),
(16, 'LM741 Operational Amplifier', 'LM741 Op Amp', 20, 15, 'The LM741 series are general purpose operational amplifiers which feature improved performance over industry standards like the LM709. They are direct, plug-in replacements for the 709C, LM201, MC1439 and 748 in most applications. The amplifiers offer many features which make their application nearly foolproof: overload protection on the input and output, no latch-up when the common mode range is exceeded, as well as freedom from oscillations. ', 'High-gain, Frequency Compensated Op-Amps.*Input Voltage: 2mV.*Input Offset Current: 20 nA.*Input Bias Current: 80 nA.*Supply Current: 1.7 mA.*Supply Voltage:  5V to  18V.', '-', 'IC', 0, 0, 1, 0, 0, 0, 'LM741 operational amplifier\r\nOpamp op amp'),
(17, 'Relay- 2 Channel', 'Relay- 2 Channel', 50, 35, 'Switch is controlled using 6V and control 7A and 240V AC.', 'Coil and contacts:1500VAC/min.*Contact and contacts: 1000VAC/min.*Insulation resistance: &gt;=100M (ohm).*Mounting form: PCB.*Contact form: 1a, 1b, 1c.*Rated load: 10A 250VAC/28VDC,10A 125VAC/28VDC,10A 125VAC/28VDC.*Contact resistance: &lt;=100m (ohm).*\r\nElectrical life: 100,000.*Mechanical life: 10,000,000.*Coil rated voltage: 3-48VDC.*Coil power: 0.36W, 0.45W.*Coil pick-up voltage: &lt;=75%.*Coil drop-out voltage: &gt;=10%.*Ambient temperature: -25 degrees Celsius to +70 degrees Celsius.*Size: 1.5cm x 1.9cm x 2cm.', '-', 'Basic Components', 0, 0, 2, 1, 0, 0, 'Relay channel'),
(18, 'Copper Board', 'Copper Board', 49, 25, '4X4 inch copper board.', 'Single Side Copper Clad Laminate Circuit Board 4x4inch (Glass Epoxy FR4 PCB).*Layers : Single Sided; Material : FR4 Glass Epoxy.*Package Content : 1xSingle Side Copper board.*Vast Applications; Research &amp; Development.', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'copper board'),
(19, 'Casio Fx-991MS Scientific Calculator', '991Ms Calculator', 799, 769, '991 MS Scientific Calculator for your engineering studies.', 'Scientific Calcualtor*12 Digits Display*Powered By Solar Powered with an Auxiliary Battery*Length: 125 mm*Width: 80 mm*Brand Name: Casio*Model No: Casio FX 991 MS*Key Type: Plastic Keys*Display (Lines): 2*Power Source: Solar Powered with an Auxiliary Battery*Dimensions: 125 mm x 80 mm x 125 mm*Weight: 140 g', '-', 'Basic Components', 1, 0, 1, 1, 0, 0, '991MS scientific calculator calc'),
(20, 'CRO Probes', 'CRO Probes', 100, 90, 'High quality CRO Probes.', 'Input Resistance:1M:10M*Compensation Range:10pF-30pF*Cable length:120cm*Temperature opertating:-10-50*Humidity:5% (relative humidity)*Cable length:100 cm*Net weight:80g*Color:Grey+Black', '-', 'Basic Components', 0, 1, 1, 1, 0, 0, 'CRO probes wires wire crocodile pin pins'),
(21, 'Capacitor Bank', 'Capacitor Bank', 35, 20, 'A set of various capacitors for all your project requirements.', '-', '0.1uF X 2*1uF X 2*10uF X 2*100uF X 2', 'Basic Components', 0, 0, 1, 1, 0, 0, 'capacitor capacitors'),
(96, '1 OF 8 DECODER / DEMULTIPLEXER SN54/74LS138', 'IC 74138', 30, 20, 'The LSTTL/MSI SN54/74LS138 is a high speed 1-of-8 Decoder/\r\nDemultiplexer. This device is ideally suited for high speed bipolar memory\r\nchip select address decoding. The multiple input enables allow parallel expansion\r\nto a 1-of-24 decoder using just three LS138 devices or to a 1-of-32\r\ndecoder using four LS138s and one inverter. The LS138 is fabricated with the\r\nSchottky barrier diode process for high speed and is completely compatible\r\nwith all Motorola TTL families.\r\nâ€¢ Demultiplexing Capability\r\nâ€¢ Multiple Input Enable for Easy Expansion\r\nâ€¢ Typical Power Dissipation of 32 mW\r\nâ€¢ Active Low Mutually Exclusive Outputs\r\nâ€¢ Input Clamp Diodes Limit High Speed Termination Effects\r\n', '-', 'IC 74138 : 1X', 'IC', 0, 0, 1, 1, 0, 0, '74LS138  IC 74138\r\n1to8 decoder demultiplexer'),
(23, 'Battery Storage Case', 'Battery Case', 60, 40, '4 AA Size battery holder case. Use for general purpose.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'Battery case'),
(24, 'Transistors BC457 - 10 Pcs.', 'Transistors BC4547', 15, 15, 'Basic transistor for electronics circuit.\r\n A transistor is a semiconductor device used to amplify or switch electronic signals and electrical power. It is composed of semiconductor material usually with at least three terminals for connection to an external circuit. \r\nfor more info refer datasheet of BC547.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'BC457  transistors'),
(25, 'White LEDs 10 Pieces', 'White LEDs', 15, 10, 'A set of 10 White LEDs.', 'Color:White*Voltage:5V*Current:25mA max', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'Led leds'),
(26, 'Connecting Wires (4 Meters)', 'Connecting Wires', 35, 27, 'Single core wire with high strength.', '-', '-', 'Basic Components', 0, 1, 1, 1, 0, 0, 'wires wire'),
(27, 'Double Sided Tape', 'Double Sided Tape', 30, 20, 'A roll of high quality double sided tape.', 'Length: 1.5m*Width:1.2in', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'double sided tape'),
(28, 'Resistor Box', 'Resistor Box', 35, 30, '150 Resistors 1/4 watt mix resistor (Type 30 X 5 each) Kit with Box', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'resistor resistors'),
(29, 'IC 7805 Voltage Regulator', '7805', 22, 15, 'Voltage regulator IC 5V\r\nA voltage regulator IC maintains the output voltage at a constant value. ', '-', '-', 'IC', 0, 0, 1, 1, 0, 0, 'IC 7805 voltage regulator'),
(30, 'Soldering Wire 50gm (flux added)', 'Soldering Wire', 60, 29, 'A roll of high quality soldering wire.', 'High Quality*FLux Added*Weight:25g*Wire Diameter: 0.5mm*Melting Point: 361F/183C*100% Brand New and High Quality rosin core solder Good solderability, insulation resistance, No spattering and Non-corrosive.', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'soldering wire wires solder'),
(31, 'Soldering Iron', 'Soldering Iron', 150, 129, 'Soldering iron with temperature upto 200C', 'S150A 50W, 230V*Heavy Duty Max. Temp upto 200 C*Solder Heat Sink,Metal', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'Soldering iron solder'),
(32, 'PCB 4 X 4 in (Perfboard)', 'PCB 4 X 4 in', 30, 20, 'PCB 4 X 4 in (Perfboard)', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, '4X4 PCB board perfboard copper'),
(33, 'PCB 6 Inch X 4 Inch( Perfboard )', 'PCB 6 X 4 In', 50, 35, 'PCB 6 Inch X 4 Inch( Perfboard )', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, '6X4 PCB perfboard board copper'),
(34, 'Cutter- Wire Stripper and Cutter', 'Cutter', 50, 40, 'Easy to use and durable wire cutter/stripper for home and industrial use.', 'High-quality and cost competitive hand tools for safe use.*Product type:Hand Tools*PYE make Wire stripper and Wire cutter for Home, Industrial or workmans use.*Easy to use and durable for long lasting use.', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'cutter clipper'),
(35, 'Male to Male Jumper Pins (10 units)', 'M to M Jumper Cables', 50, 30, 'In all different colors.', '-', '-', 'Basic Components', 1, 0, 1, 1, 0, 0, 'male jumper m2m cables wires wire mtom cable'),
(36, 'Male to Female Jumper Cable (10 Units)', 'M to F Jumper Cables', 50, 30, 'In all different colors.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'female male jumper m2f f2m cables wires wire mtof ftom wire cable'),
(37, 'Digital Multimeter (DMM)', 'Digital Multimeter', 150, 135, 'Small Multimeter for your day to day needs. If you have basic knowledge about Multimeters you can try this small Multimeter for basic continuity checks &amp; Voltage Measurements. When testing DC voltage, AC voltage, DC current, resistance, diode, buzzer and battery, connect the red test lead to V 0 mA jack and black test lead to COM jack. When testing the current more than 200mA, connect the red test lead to OADC jack and black test lead to COM jack. When testing the temperature, connect the temperature probe to V, 0, mA jack or COM jack.', '-', '-', 'Basic Components', 1, 0, 1, 1, 0, 0, 'digital multimeter dmm'),
(38, 'Bread Board 840 Points', 'Bread Board', 90, 65, '840 Tie points - 128 Groups of 5 connected terminals, 8 Bus of 25 connected terminals.\r\nReusable for fast build a prototype of an electronic circuit - will accept transistors, diodes, LEDS, resistors, capacitors and virtually all types of components - No soldering required - Can modify or revise the circuits easily\r\nFit for jumper wire of 0.8mm diameter - Standard 2.54mm hole spacing\r\nAdhesive sheet on the back side of the board - Multiple breadboards can be spliced together too', '-', '-', 'Basic Components', 1, 0, 1, 1, 0, 0, 'Breadboard bread board'),
(39, '9V Battery + Cap', '9V Battery + Cap', 30, 25, '9V Battery with a cap used for connections.', '-', '9V Battery*Cap', 'Basic Components', 0, 0, 2, 1, 0, 0, '9V Battery cap'),
(40, '1x4 H-Bridge L293D Motor Driver', 'L298N Motor Driver', 400, 200, 'Dual-H Bridge L298N 4 DC Motor Driver Module.This allows you to control the speed and direction of two DC motors, or control one bipolar stepper motor with ease.', '-', '-', 'Robotics', 0, 1, 2, 1, 0, 0, 'L298N motor driver'),
(41, 'Servo Motor', 'Servo Motor', 160, 129, 'Servo motor with operating speed of 0.12sec / 60 degrees (4.8V no load).\r\nA servomotor is a rotary actuator or linear actuator that allows for precise control of angular or linear position, velocity and acceleration. It consists of a suitable motor coupled to a sensor for position feedback.', 'Dead Band Width : 2 usec*Gear Type : All Nylon Gear*Motor Type : coreless motor*Connector Wire Length : 150mm*Stall Torque : 1.5kg/cm at 4.8V*Operation Voltage : 3.0 - 7.2Volts*Dimension : 22mm x 12mm x 29mm*Temperature Range : -30 to +60 Degree C*Operating Speed : 0.12sec / 60 degrees (4.8V no load)', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'servo motor'),
(42, 'HDMI To VGA Cable', 'HDMI To VGA Cable', 650, 330, 'The built in chip set separates the HDMI signal and converts the Video for use on the VGA output port and the aux audio output port. Perfect for use with older monitors and televisions. This adapter will not functional in reverse, it will not convert VGA to HDMI. No external power supply required.Very light weight at just 61 gm.', '-', '-', 'Robotics', 0, 0, 1, 0, 0, 0, 'HDMI VGI cable wire wires cables'),
(43, 'Metal 4 Wheel Robot Chasis', '4 Wheel Chasis', 140, 120, '109 grams 4 wheel metal chasis.', '-', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'chasis wheel robot metal wheels car'),
(93, 'USB asp AVR Programming Device for ATMEL proccessors', 'AVR Programmer', 400, 280, 'USB ASP AVR PROGRAMMING DEVICE FOR ATMEL PROCCESSORS is a USB in-circuit programmer for Atmel AVR controllers. USBASP AVR PROGRAMMING DEVICE FOR ATMEL PROCCESSORS simply consists of an ATMega88 or an ATMega8 and a couple of passive components. The programmer uses a firmware-only USB driver; no special USB controller is needed.', 'MODEL NO. :USBASP AVR PROGRAMMING DEVICE FOR ATMEL PROCCESSORS*WEIGHT &amp; DIMENSIONS:25g*\r\nMATERIAL &amp; COLOR:NA &amp; Blue', '-', 'Controllers', 0, 0, 2, 0, 0, 0, 'avr atmega processors atmel'),
(45, 'Caster Wheel ', 'Caster Wheel', 25, 19, 'Caster for general robotic application. 15mm diameter caster wheel with 3 mounting holes. Ball diameter 13mm widely used in line follower robot.', '-', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'caster wheel wheels robot car'),
(46, 'BO Small Wheel with rubber grip', 'BO Small Wheel', 25, 15, 'Wheel with diameter 75mm (7.5cm).', 'Screw is mounted from front for keeping wheel in place.*Diameter of wheel: 75mm (7.5cm).*Width of wheel: 15mm (1.5cm).', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'bo wheel wheels robot car'),
(47, 'DC Hobby BO Motor-60 RPM', 'DC Motor', 110, 85, '3V- 9V BO Motor', 'Voltage: 3V - 9V.*Current: 100mA at 9V @ no load.*Speed: 100 RPM.', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'motor'),
(48, 'L293D Motor Driver with 4 channel output', 'L293D Motor Driver', 170, 149, 'We bring forth L293D Motor Driver for driving DC motors and is ideal for robotics applications. L293D Motor Driver is a medium power motor driver perfect for driving DC motors and Stepper motors. L293D Motor Driver uses the popular L293D H-bridge motor driver IC. It can drive 4 DC motors in one direction, or drive 2 DC motors in both the directions with speed control. The driver greatly simplifies and increases the ease with which you may control motors, relays, etc. from microcontrollers. L293D Motor Driver can drive motors up to 12 V with a total DC current of up to 600mA ', 'Operating Voltage : 7 V to 12V DC*4 channel output(can drive 2 DC motors bidirectional)*600mA output current capability per channel*PTR connectors for easy connections*User accessible enable pins facility', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'L293D motor driver'),
(49, '2 Motor High Quality Metal Chassis', '2 Wheel Metal Chassis', 130, 99, 'Chassis Board is the mechanical frame structure of the mobile robots. It should is the backbone of the robot. We arrange/connect everything like motors, sensors, wheels, development board, studs, clamps , screws, etc. of the robot to it.\r\nIt gives us the base to build our robot and allow us place our components according to our requirements.', 'Single type of screw is compatible.*Motor Clamp is present.*There is enough space between the chassis and the wheel for proper movement of the wheel.*This Chassis board can be used for two motor based robot.*This chassis can be used to build for mobile robots.*This chassis can have one rotary castor wheel for balancing the robot so that it is not tilted to one side of it.*This chassis can be used along with the Robosapiens Development board.', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'car chasis wheel wheels metal robot'),
(50, 'Raspberry Pi Model 3 b+ with wifi and Bluetooth', 'Raspberry Pi 3', 3000, 2849, 'The stunning new Raspberry Pi 3 Model B has landed at MALGADI Electronics!The Raspberry Pi 3 is the third-generation Raspberry Pi. It replaced the Raspberry Pi 2 Model B in February 2016. This third generation model maintains the same popular board format as the Raspberry Pi 2 and Raspberry Pi B+, but boasts a faster 1.2GHz 64Bit SoC, and on board WiFi and Bluetooth! ', 'Quad Core 1.2GHz Broadcom BCM2837 64bit CPU*1GB RAM*BCM43438 wireless LAN and Bluetooth 4.1(Including bluetooth Low Energy) (BLE) on board*40-pin extended GPIO*4 USB 2 ports*4 Pole stereo output and composite video port*Full size HDMI*CSI camera port for connecting a Raspberry Pi camera*DSI display port for connecting a Raspberry Pi touchscreen display*Micro SD port for loading your operating system and storing data*Upgraded switched Micro USB power source up to 2.5A', '-', 'Controllers', 0, 0, 1, 1, 0, 0, 'raspberry pi'),
(51, 'ESP 8266 Wifi Module', 'ESP 8266 Wifi Module', 299, 225, '802.11 b or g or n protocol Wi-Fi 2.4 GHz, support WPA or WPA2.', '802.11 b or g or n protocol Wi-Fi 2.4 GHz, support WPA or WPA2*Super small module size (11.5mm x 11.5mm)*Deep sleep power &lt;10uA*Power down leakage current &lt; 5uA*Integrated low power 32-bit MCU*Wake up and transmit packets in &lt; 2ms*Standby power consumption of &lt; 1.0mW (DTIM3) ', '-', 'Sensors', 0, 0, 2, 1, 0, 0, 'ESP 8266 wifi'),
(52, 'AT89S51-24PU - AT89S51 40-Pin 24MHz 8kb 8-bit Microcontroller', 'AVR AT89S51', 75, 55, 'Compatible with MCS-51 Products. 8K Bytes of In-System Reprogrammable Flash Memory.', 'Compatible with MCS-51 Products*8K Bytes of In-System Reprogrammable Flash Memory*32 Programmable I/O Lines*256 x 8-bit Internal RAM*Fully Static Operation: 0 Hz to 24 MHz', '-', 'IC', 0, 0, 1, 1, 0, 0, 'avr at89s51 8951 atmega'),
(53, 'NodeMCU LUA WiFi Internet Of Things ESP8266 ESP-12E', 'NodeMCU LUA WiFi ', 475, 450, 'Power your developement in the fastest way combinating with NodeMCU Firmware! USB-TTL included, plug&amp;play.', 'Open-source*Interactive*Programmable*Low Cost* WI-FI enabled*The Development Kit based on ESP8266, integates GPIO, PWM, IIC, 1-Wire and ADC all in one board.*Power your developement in the fastest way combinating with NodeMCU Firmware!*USB-TTL included, plug&amp;play*10 GPIO, every GPIO can be PWM, I2C, 1-wire', '-', 'Controllers', 0, 1, 1, 1, 0, 0, 'Node MCU LUA wifi iot ESP8266 ES esp 8266'),
(54, 'Arduino Mega', 'Arduino Mega', 900, 800, 'The Arduino Mega is a microcontroller board based on the ATmega2560. It has 54 digital input/output pins (of which 14 can be used as PWM outputs), 16 analog inputs, 4 UARTs (hardware serial ports), a 16 MHz crystal oscillator, a USB connection, a power jack, an ICSP header, and a reset button.', 'Operating Voltage        5V*Input Voltage (recommended)        7-12V*Input Voltage (limits) 6-20V*Digital I/O Pins        54 (of which 15 provide PWM output)*Analog Input Pins 16*DC Current per I/O Pin 40 mA*DC Current for 3.3V Pin 50 mA*Flash Memory 128 KB of which 4 KB used by bootloader*SRAM 8 KB*EEPROM 4 KB*Clock Speed 16 MHz', '-', 'Controllers', 0, 0, 1, 0, 0, 0, 'Arduino mega'),
(55, 'AVR 40 Pin ATMEGA32 microcontroller IC ATMEL', 'ATMEGA32 Microcontroller', 280, 250, '-', 'High-performance, Low-power AVR 8-bit Microcontroller.*Advanced RISC Architecture|High Endurance Non-volatile Memory segments *JTAG (IEEE std. 1149.1 Compliant) Interface|Peripheral Features *Special Microcontroller Features - Power-on Reset and Programmable Brown-out Detection *Internal Calibrated RC Oscillator - External and Internal Interrupt Sources - Six Sleep Modes: Idle, ADC Noise Reduction, Power-save, Power-down, Standby and Extended Standby *32 Programmable I/O Lines|- 4.5 - 5.5V for ATmega32|- 0 - 16 MHz for ATmega32', '-', 'IC', 0, 0, 1, 1, 0, 0, ' ATMEGA microcontroller IC ATMEL avr'),
(56, 'Arduino Nano Board 3.0 Atmega328 With Cable', 'Arduino Nano Board+Cable', 385, 290, '-', 'Microcontroller: ATmega328*Operating Voltage (logic level): 5V*Input Voltage (recommended): 7-12V*Input Voltage (limits): 6-20V*Digital I/O Pins: 14 (of which 6 provide PWM output)*Analog Input Pins: 8*DC Current per I/O Pin: 40mA*Flash Memory: 32KB (ATmega328) of which 2 KB used by bootloader*SRAM: 2KB (ATmega328)*EEPROM: 1KB (ATmega328)*Clock Speed: 16 MHz*Dimensions: 43 x 18 x 19mm*Weight: 6', '-', 'Controllers', 0, 0, 1, 0, 0, 0, 'Arduino Nano ATMEGA328 atmega'),
(57, 'Arduino UNO With A To B Cable.', 'Arduino UNO+Cable.', 700, 449, 'Arduino consists of both a physical programmable circuit board (often referred to as a microcontroller) and a piece of software, or IDE (Integrated Development Environment) that runs on your computer, used to write and upload computer code to the physical board.', 'Microcontroller ATmega328P*Operating Voltage : 5V*Digital I/O Pins 14 (of which 6 provide PWM output)*PWM Digital I/O Pins 6 Analog Input Pins 6*Flash Memory 32 KB (ATmega328P) of which 0.5 KB used by bootloader', '-', 'Controllers', 1, 0, 1, 1, 0, 0, 'Arduino UNO'),
(58, 'Arduino UNO Cable (A To B)', 'Arduino UNO Cable ', 70, 40, 'Easy use: plug and play programming cable for any arduino UNO model.', '-', '-', 'Controllers', 0, 0, 1, 1, 0, 0, 'Arduino UNO cable cables wire wires atob A'),
(59, 'Current Clamp Meter', 'Current Clamp Meter', 470, 430, 'Clamp meter is a non contact mesuring instrument used to measure current flowing through a conductor. The meter can able to measure both AC as well DC current. The meter is clamped around the wire and display shows the amount of current.', '-', '-', 'Sensors', 0, 0, 1, 1, 0, 0, 'current clamp meter'),
(60, 'IR Transmitter And Receiver Sensor Pair', 'IR Transmitter &amp; Receiver', 165, 65, '-', '-', '-', 'Sensors', 0, 0, 1, 1, 0, 0, 'IR Transmitter receiver'),
(61, 'Temperature Sensor LM35', 'Temperature Sensor LM35', 100, 69, 'Good Quality. Mainly ued for sensing temperature in your project.', '-', '-', 'Sensors', 0, 0, 1, 1, 0, 0, 'LM35 temperature'),
(62, 'Fingerprint Sensor GT511C3', 'Fingerprint Sensor', 2500, 1700, '-', 'High-Speed, High-Accuracy Fingerprint Identification using the SmackFinger 3.0 Algorithm*Download Fingerprint Images from the Device*Read and Write Fingerprint Templates and Databases*Simple UART protocol (Default 9600 baud)*Capable of 1:1 Verification and 1:N Identification', 'Fingerprint Sensor*Wires', 'Sensors', 0, 0, 3, 0, 0, 0, 'Fingerprint sensor finger'),
(63, 'Bluetooth Module', 'Bluetooth Module', 300, 280, '-', 'Typical -80dBm sensitivity *Up to +4dBm RF transmit power*UART interface with programmable baud rate *Default Baud rate: 9600, Data bits:8, Stop bit:1,Parity:No parity, Data control: has. *Permit pairing device to connect as default.', '-', 'Sensors', 0, 1, 1, 1, 0, 0, 'bluetooth'),
(64, 'Shock Resistant Solar Panel', 'Shock Resistant Solar Panel', 450, 350, '-', 'Max voltage out put: 8 v*Power : 700 mW (@1000 W/m2 , 25 degree temp)*shock resistance pannel', '-', 'Sensors', 0, 0, 2, 0, 0, 0, 'shock resistant solar panel'),
(65, 'UltraSonic Sensor(Hc-Sr04 )', 'UltraSonic Sensor', 150, 124, '-', 'Working Voltage : 5V(DC) , Static current: Less than 2mA.*Output signal : Electric frequency signal, high level 5V, low level 0V. , Sensor angle : Not more than 15 degrees.*Detection distance : 2cm-450cm. ,High precision : Up to 2mm,Input trigger signal : 10us TTL impulse , Echo signal : output TTL PWL signal NOTE : The module has a blind spot of 2cm(very near).', '-', 'Sensors', 0, 0, 1, 1, 0, 0, 'Hc Sr04 ultrasonic'),
(66, 'IR Sensor Module', 'IR Sensor Module', 90, 80, '-', 'Obstacle Detector Sensor, Line Following Sensor, Proximity Sensor*10-12cm range. Potentiometer for maximum range setting.*Can be used to differentiate between black and white (Can be used for line sensing*Onboard LED indication for detection*Works on 5V or 3.3V input. TTL compatible output', '-', 'Sensors', 0, 0, 1, 1, 0, 0, 'IR infrared'),
(67, 'Play with Arduino Kit', 'Play with Arduino Kit', 1199, 849, 'The Arduino Starter Fun play kit of Malgadi is your window to the world of Arduino. This is an ideal kit for beginner. This kit covers all the basic concepts of Arduino. This kit of Arduino is designed for all, withholding no boundaries of age and stream.', '-', 'RGB led*Jumper wires m2m,m2f*Buzzer*Arduino with cable* Ultrasonic*LCD display*Potentiometer*Push switch*9v battery*LDR*Jack cable', 'Kits', 0, 1, 1, 1, 0, 0, 'Arduino'),
(68, 'Line Following Robot Kit Without Arduino', 'Line Follower Kit(No Arduino)', 1000, 679, 'This kit contains same component as complete line following robot kit but without arduino.', '-', 'DC motor x 2*Acrylic sheet*Wheel x 2*\r\ncaster wheel*Batteries with cap x 2*IR module*L293D module*m2m and m2f jumper pin*Connecting wires', 'Kits', 0, 0, 1, 1, 0, 0, 'line following robot car follower'),
(69, 'Line Following Robot Complete Kit', 'Line Following Robot Kit', 1500, 1099, '-', '-', 'Arduino Uno*DC motor x 2*Acrylic sheet*Wheel x 2*\r\ncaster wheel*Batteries with cap x 2*IR module*L293D module*m2m and m2f jumper pin*Connecting wires', 'Kits', 0, 0, 1, 0, 0, 0, 'line following follower robot car'),
(70, 'Digital Electronics Kit', 'Digital Electronics', 175, 155, '-', '-', 'Ic 7474 (D flip flop)*Ic 7476 (JK flip flop)*Ic 74151 (multiplexer) *Ic 74138 (d multiplexer) *Ic 7495 (shift register) *Ic 74193 (counter ic) *Seven segment display - common cathode *555 timer IC*741 OPamp IC', 'Kits', 0, 1, 1, 1, 0, 0, 'Digital electronics'),
(71, 'General Purpose Electronics Components Kit', 'General Purpose Electronics', 130, 120, '-', '-', 'AND, OR, NOT gate ICs *Capacitors(0.1uFx2, 1uFx2, 10uFx2, 100uFx2, 1000uFx2)*Diode x 10*RGB leds x 10*Transistors BC547', 'Kits', 0, 1, 1, 1, 0, 0, 'general electronics'),
(72, 'Tool Kit', 'Tool Kit', 350, 279, '-', '-', 'Soldering Wire*Solder Iron* Cutter*Double-sided tape-Screwdriver kit', 'Kits', 0, 0, 1, 0, 0, 0, 'Tools tool'),
(73, 'Basic Electronics Kit', 'Basic Electronics Kit', 570, 449, '-', '-', 'Bread board*Digital multimeter*Gate ICs (AND, OR, NOT)*LEDs x 5*Resister Box*Diode x 4*Transiter x 4*Connecting Wire: 3 meter with 2 different color*Cutter*Capacitor Bank*cro probs', 'Kits', 1, 0, 1, 1, 0, 0, 'basic electronics gates'),
(74, 'Robot Kit For Beginners', 'Robot Kit For Beginners', 900, 649, '-', '-', 'Two wheels metal chassis body*DC motor x 2*rubber coated wheels x 2*caster wheel*PCB*9V batteries with cap x 2*ive volt regulator IC*IR sensor*AND,OR,NOT gate ic*L293D module*Male Header*f2f and m2f jumper pin', 'Kits', 0, 0, 1, 1, 0, 0, 'robot car'),
(75, 'Kit For Variable Power Supply', 'Variable Power Supply Kit', 150, 135, '-', '-', '12-0-12 transformer*4 x 6 inch PCB*Capacitor x 3 (10uf, 100uf, 1000uf)*Connecting wires*Diode x 6*Potentiometer*Voltage regulator IC 7805*LM317 IC*LED', 'Kits', 0, 0, 1, 1, 0, 0, 'variable power supply'),
(76, 'Engineering Graphics Kit', 'Engineering Graphics Kit', 620, 589, 'EG Kit specially designed for 1st year students', '-', 'Mini Drafter (Omega)*Set Squares*Rounder Compass*Drawing Board Clips*Protractor*Ruler*Master circle', 'EG Kits', 1, 0, 1, 1, 0, 0, 'Engineering Graphics eg'),
(77, 'Lipo Battery', 'Lipo Battery', 1800, 1400, '-', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'Lipo battery'),
(78, 'Android Car With Bluetooth Module Kit', 'Android Car Kit', 3150, 2205, '-', '-', '4 Wheel Metal Chassis*DC Motor 300RPM X4*HC 05 Bluetooth module*Arduino Uno with USB A to B Cable*Wheel X4*Male to Male Jumper X10*Male to Female Jumper X10*L298N Motor Driver', 'Kits', 0, 0, 1, 1, 0, 0, 'Arduino car cars bluetooth robot'),
(80, '4 kg-cm Stepper Motor(4 wire bipolar for CNC / Robotics)', 'Stepper Motor', 900, 750, 'Stepper motor divides a full rotation into a number of equal steps. Thus , motorâ€™s position can be commanded to move and hold at one of these steps , as long as the motor is carefully sized to the application in respect to torque and speed .\r\n\r\nWe are engaged in supplying and wholesaling a quality approved collection of Stepper Motors which is highly acknowledged and accepted for long service life and high reliability. These offered motors are fabricated by using best grade raw materials and a strict QC is maintained.', 'Step Angle Step Angle: 1.8 Â°*\r\nVoltage / Rated Voltage: 2.55 V*\r\nCurrent / Rated Current: 1.7 A / phase*\r\nResistance / Resistance: 1.5 Ohm / phase*\r\nInductance / Inductance: 2.8mH / phase*\r\nHolding torque / Holding Torque: 40N-cm*\r\nCogging torque / detent torque: 2.2 N.cm Max*\r\nTorque / rotor torque: 54g cmÂ²*\r\nLine shafts / Lead Wires: 4*\r\nThread Diameter / Shaft diameter: 5,0mm*\r\nMotor Length / Motor Length: 40mm*\r\nWeight / Motor Weight (kg): 0.34*\r\nWiring / Lead Wires Connection: 4 wires / leads: Back â€“ A +, Green â€“ A-, Red â€“ B +, Blue â€“ B-', '-', 'Robotics', 0, 0, 3, 0, 0, 0, 'motor stepper car robot'),
(86, 'IC 7402', 'LM7402', 30, 20, '7402 IC is a device containing four independent gates each of which performs the logic NOR function', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'nor gate 7402 ic gates'),
(87, 'IC LM7408', 'LM7408', 20, 15, '7408 IC is a QUAD 2-Input AND GATES and contains four independent gates each of which performs the logic AND function. Fairchild manufactures this IC in a 14-Lead Plastic Dual-In-Line Package (PDIP), JEDEC MS-001, 0.300â€³ Wide.', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC7408 7408 ic gate gates and'),
(88, 'IC LM7486', 'LM7486', 40, 25, '7486 Quad 2-input Exclusive-OR Gate. The Exclusive-OR logic function is a very useful circuit that can be used in many different types of computational circuits.\r\n', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC 7486 gate gates exor ex-or ex'),
(89, 'IC 7400 (Two-Input NAND gates)', '7400', 40, 20, '-', '         Specific functions are described in a list of 7400 series integrated circuits. ... The first part number in the series, the 7400, is a 14-pin IC containing four two-input NAND gates. Each gate uses two input pins and one output pin, with the remaining two pins being power (+5 V) and ground.', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC7400 NAND GATE gates ic 7400'),
(90, 'IC 7404(Not Gate Ic)', '7404', 30, 15, '7404 is a NOT gate IC. It consists of six inverters which perform logical invert action. The output of an inverter is the complement of its input logic state, i.e., when input is high its output is low and vice versa', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC7404 NOT GATE 7404 gates'),
(82, 'A4988 Stepper Motor Driver Carrier', 'A4988 Driver', 386, 150, 'Overview:-\r\n\r\n                      This product is a carrier board or breakout board for Allegroâ€™s A4988 DMOS Microstepping Driver with Translator and Overcurrent Protection; we therefore recommend careful reading of the A4988 datasheet (1MB pdf) before using this product. This stepper motor driver lets you control one bipolar stepper motor at up to 2 A output current per coil (see the Power Dissipation Considerations section below for more information). Here are some of the driverâ€™s key features:\r\n\r\n1.Simple step and direction control interface*\r\n2.Five different step resolutions: full-step, half-step, quarter-step, eighth-step, and sixteenth-step*\r\n3.Adjustable current control lets you set the maximum current output with a potentiometer, which lets you use voltages above your stepper motorâ€™s rated voltage to achieve higher step rates*\r\n4.Intelligent chopping control that automatically selects the correct current decay mode (fast decay or slow decay)*\r\n5.Over-temperature thermal shutdown, under-voltage lockout, and crossover-current protection*\r\n6.Short-to-ground and shorted-load protection', 'Dimensions*\r\nSize:	0.6â€³ Ã— 0.8â€³  \r\nWeight:	1.3 g1*\r\n\r\nMinimum operating voltage:	8 V*\r\nMaximum operating voltage:	35 V*\r\nContinuous current per phase:	1 A2*\r\nMaximum current per phase:	2 A3*\r\nMinimum logic voltage:	3 V*\r\nMaximum logic voltage:	5.5 V*\r\nMicrostep resolutions:	full, 1/2, 1/4, 1/8, and 1/16*\r\nReverse voltage protection?:	N*\r\nBulk packaged:	N*\r\nHeader pins soldered:	N4', '-', 'Robotics', 0, 0, 3, 0, 0, 0, 'A4988 Stepper Motor Driver Carrier car cars robot'),
(85, 'The Radar Kit', 'Radar Kit', 420, 320, 'This Kit Teaches you about basic knowledge of sonic sensor and Servo Motor.\r\nYou Will Learn About basic controlling of servo motor and how to interface with sonic sensor.', 'Very Good Quality Product, Made From High Quality Raw Material.', 'Servo Motor : 1x*\r\nSonic Sensor : 1x*\r\nJumper Cables : F2F 10x | M2M 10x\r\n', 'Kits', 0, 0, 3, 1, 1, 0, 'radar'),
(84, 'DC SMPS Power Supply', 'Power Supply', 1000, 600, '-', 'Output: 10v 10amp Universal AC input / Full range, 100% Full Load Burn-in Test*\r\nA high quality, consistent power supply IN-DOOR USE ONLY!*\r\nProtections: Overload / Over Voltage / Short Circuit Auto-Recovery After Protection*\r\nFor Access Control System ,Security systems , CC tv Cameras etc*\r\nLength-20 cms*Breadth - 12cms* height - 5.5cms *Weight -765 grams', '-', 'Robotics', 0, 0, 1, 1, 0, 0, 'DC Power Supply'),
(91, 'IC 7432(OR GATE)', '7432', 20, 15, 'The 7432 IC package contains four independent positive logic OR GATES. Pins 14 and 7 provide power for all four logic gates.\r\n', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC7432 OR GATE gates 7432 ic'),
(92, 'IC 7474 (D-Type Flip-Flop)', '7474', 30, 17, '      This device contains two independent positive-edge-triggered\r\nD-type flip-flops with complementary outputs. The\r\ninformation on the D input is accepted by the flip-flops on\r\nthe positive going edge of the clock pulse. The triggering\r\noccurs at a voltage level and is not directly related to the\r\ntransition time of the rising edge of the clock. The data on\r\nthe D input may be changed while the clock is LOW or\r\nHIGH without affecting the outputs as long as the data\r\nsetup and hold times are not violated. A LOW logic level on\r\nthe preset or clear inputs will set or reset the outputs\r\nregardless of the logic levels of the other inputs.', '-', '-', 'IC', 0, 0, 1, 1, 1, 0, 'IC 7474 D flipflop flip flop flip-flop'),
(94, 'Push Button Switch', 'Switch', 15, 10, '2 Lag Push Button Switch For Digital Electronics Projects', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'push button switch switches'),
(95, '4x4 Keyboard Matrix', '4x4 Keyboard', 250, 130, 'In the application system of microcontroller, keyboard is essential in man-machine dialogue. When you are short of a button, you can connect one to the I/O port of the controller; but when you need a lot of buttons with limited I/O port resources, this 4*4 Matrix Keypad is no doubt your best choice. 4*4 matrix keypad is the most applied keypad form. The key layout is in matrix form, so with only eight I/O ports, we can identify 16 buttons, saving lots of I/O port resources. ', '4X4 matrix keypad. *\r\nEight I/O ports, can identify 16 buttons. *\r\nMaterial: FR4', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, 'keyboard matrix key keys'),
(97, 'Test Product', 'Test', 99, 999, 'll', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 1, ''),
(98, 'Constant Power Supply Kit', 'Constant Power Supply Kit', 140, 135, '-', '-', '12-0-12 transformer*\r\n4 x 6 inch PCB*\r\nCapacitor x 3 (10uf, 100uf, 1000uf)*\r\nConnecting wires*\r\nDiode x 6*\r\nVoltage regulator IC 7805*\r\nLM317 IC*\r\nLED', 'Kits', 0, 0, 1, 1, 0, 0, 'Constant power supply'),
(99, 'Test Product', 'Test', 100, 20, 'aa', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 1, 'tag1 tag4'),
(100, 'Case for Raspberry Pi 3 Model B ABS with Screws Black', 'Raspberry Pi case', 299, 170, 'This is a high Quality ABS Plastic Case for the Raspberry Pi. It is compatible with the Raspberry Pi 3 B, Raspberry Pi 3 B+, Raspberry Pi 2B. It fully encloses the Raspberry Pi Board with openings for all I/O ports - GPIO pins, Camera/PCI Connector, HDMI, Memory Card, USB and Ethernet Connector. It also has openings for air circulation.\r\n', '-', '-', 'Basic Components', 0, 0, 1, 0, 0, 0, 'raspberry pi case box'),
(101, 'Cable for Arduino nano(USB 2.0 A to USB 2.0 Mini B)', 'Arduino Nano Cable', 79, 49, 'It is a communication cable for arduino nano.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'cable arduino nano wire wires cables'),
(102, 'Light Dependent Resistor', 'LDR', 15, 10, 'An LDR is a component that has a (variable) resistance that changes with the light intensity that falls upon it. This allows them to be used in light sensing circuits.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, 'LDR light dependent resistor'),
(103, '74LS193', 'IC 74193', 40, 25, 'The\r\n SN54/74LS193 is an UP/DOWN BCD Decade (8421) Counte\r\n  is  an  UP/DOWN  MODULO-16  Binary  Counter\r\n.  Separate\r\nCount\r\n Up and Count Down Clocks are used and in either counting mode the\r\ncircuits operate synchronously. The outputs change state synchronous with\r\nthe LOW-to-HIGH transitions on the clock inputs', '-', '-', 'IC', 0, 0, 1, 1, 0, 0, 'ic 74193 74ls193 up down counter'),
(104, '74LS90', 'IC 7490', 40, 30, 'The 74LS90 is a simple counter', '-', '-', 'IC', 0, 0, 1, 1, 0, 0, 'ic 7490 counter'),
(108, '8Pin IC Socket - Dip8', '8 pin IC holder', 15, 8, '8Pin IC Socket - Dip8', '-', '-', 'IC', 0, 0, 1, 1, 0, 0, '8 pin ic holder socket'),
(110, 'Test Producta', 'Test', 102, 100, 'Test', 'a*b*c*d', 'A*b*c', 'EG Kits', 0, 0, 1, 1, 0, 1, 'a b c'),
(111, '9V Battery', '9V Battery', 25, 20, 'The standard 9V battery used in projects.', '-', '-', 'Basic Components', 0, 0, 1, 1, 0, 0, '9V battery cell'),
(112, 'STM32F407VGT-DISC1', 'STM32F4-Discovery Board', 5777, 2000, 'he STM32F4DISCOVERY kit leverages the capabilities of the STM32F407 high performance microcontrollers, to allow users to easily develop applications featuring audio.\r\n\r\nIt includes an ST-LINK embedded debug tool, one ST-MEMS digital accelerometer, a digital microphone, one audio DAC with integrated class D speaker driver, LEDs, push-buttons and an USB OTG micro-AB connector.\r\n\r\nTo expand the functionality of the STM32F4DISCOVERY kit with ethernet connectivity, LCD display.\r\n\r\nWith the latest board enhancement, the new order code STM32F407G-DISC1 has replaced the old reference STM32F4DISCOVERY.\r\n\r\nKey Applications: Motor drive and application control, Medical equipment, Industrial applications: PLC, inverters, circuit breakers, Printers, and scanners, Alarm systems, video intercom, and HVAC, Home audio appliances.', 'STM32F407VGT6 microcontroller featuring 32-bit ARM Cortex-M4F core, 1 MB Flash, 192 KB RAM in an LQFP100 package\r\n*On-board ST-LINK/V2 with selection mode switch to use the kit as a standalone ST-LINK/V2 (with SWD connector for programming and debugging)\r\n*Board power supply: through USB bus or from an external 5 V supply voltage\r\n*External application power supply: 3 V and 5 V\r\n*LIS302DL, ST MEMS motion sensor, 3-axis digital output accelerometer\r\n*MP45DT02, ST MEMS audio sensor, omni-directional digital microphone\r\n*CS43L22, audio DAC with integrated class D speaker driver\r\n*Eight LEDs:\r\n*  LD1 (red/green) for USB communication\r\n*  LD2 (red) for 3.3 V power on\r\n*  Four user LEDs, LD3 (orange), LD4 (green), LD5 (red) and LD6 (blue)\r\n*  2 USB OTG LEDs LD7 (green) VBus and LD8 (red) over-current\r\n*  Two push buttons (user and reset)\r\n*USB OTG FS with micro-AB connector\r\n*Extension header for all LQFP100 I/Os for quick connection to prototyping board and easy probing', '1x Discovery-Board * 1x USB-MINI Cable* Whole Video Tutorial', 'Controllers', 0, 1, 1, 1, 1, 1, 'Discovery STM STM32 Board'),
(113, 'nRF24L01+', 'RF Module', 500, 300, 'nRF24L01 is a single chip radio transceiver for the world wide 2.4 - 2.5 GHz ISM band. The transceiver consists of a fully integrated frequency synthesizer, a power amplifier, a crystal oscillator, a demodulator, modulator and Enhanced ShockBurstâ„¢ protocol engine.', 'Low cost single-chip 2.4GHz GFSK RF transceiver IC\r\n*Worldwide license-free 2.4GHz ISM band operation\r\n*1Mbps and 2Mbps on-air data-rate\r\n*Enhanced ShockBurstâ„¢ hardware protocol accelerator\r\n*Ultra low power consumption â€“ months to years of battery lifetime\r\n*On-air compatible with all Nordic nRF24L Series in 1 and 2Mbps mode\r\n*On-air compatible with Nordic nRF24E and nRF240 Series in 1Mbps mode', '1X nrf24L01+ Module*\r\n1x Antena', 'Sensors', 0, 1, 1, 0, 0, 0, 'RF Module nrf NRF nRF RF module'),
(114, 'EG Mini Drafter (USED)', 'Mini Drafter(USED)', 475, 149, 'Since, most branches need the drafter only for 1 semester, you can choose to purchase a used drafter by a senior of our college. \r\n\r\nPlease note that the images are for illustration purpose only. Since, this is a 2nd hand product the condition may vary for each drafter, but we will be there for you to make sure that you get a good working  condition product, because ultimately that is what we here at Malgadi do and believe.', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'drafter mini'),
(115, 'EG Mini Drafter(Omega)', 'Mini Drafter(Omega)', 475, 459, 'A brand new omega mini drafter for all you engineering drawing work at the best price here at Malgadi.', '-', '-', 'EG Kits', 1, 0, 1, 1, 0, 0, 'mini drafter'),
(116, 'Set Squares', 'Set Squares', 90, 49, 'A brand new pair of high quality omega set squares.', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'set squares'),
(117, 'Protractor', 'Protractor', 10, 6, 'Good quality protractor to make that perfect angle.', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'protractors'),
(118, 'Drawing Board Clips', 'Drawing Board Clips', 25, 20, 'A pair of clips to hold that sheet firmly.', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'drawing board clips'),
(119, 'Rounder Compass', 'Rounder Compass', 109, 95, '-', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'rounder compass'),
(120, 'EG Kit (Used Drafter)', 'EG Kit (Used Drafter)', 620, 359, 'EG Kit specially designed for 1st year students. Since, most branches need the drafter only for 1 semester, you can choose to purchase a used drafter by a senior of our college. Please note that the images are for illustration purpose only. Since, this is a 2nd hand product the condition may vary for each drafter, but we will be there for you to make sure that you get a good working condition product, because ultimately that is what we here at Malgadi do and believe.', '-', 'Mini Drafter (USED)*Set Squares*Rounder Compass*Drawing Board Clips*Protractor*Ruler*Master circle', 'EG Kits', 0, 0, 1, 1, 0, 0, 'drafter'),
(121, 'Vishal Mini Drafter', 'Mini Drafter (Vishal)', 510, 230, 'A brand new VISHAL mini drafter for all you engineering drawing work at the best price here at Malgadi.', '-', '-', 'EG Kits', 1, 0, 1, 1, 0, 0, 'mini drafter'),
(122, 'Mini Drafter (OMEGA USED)', 'Mini Drafter (OMEGA USED)', 475, 239, '-', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'drafter'),
(123, 'Master Circle', 'Master Circle', 12, 10, 'Master Circle Compass', '-', '-', 'EG Kits', 0, 0, 1, 1, 0, 0, 'master circle'),
(124, 'Engineering Graphics Kit(Vishal Drafter)', 'EG kit', 450, 390, 'EG Kit specially designed for 1st year students', '-', 'Mini Drafter (Vishal)\r\n    *Set Squares\r\n   * Rounder Compass\r\n    *Drawing Board Clips\r\n   * Protractor\r\n    *Ruler\r\n   * Master circle', 'EG Kits', 0, 1, 1, 1, 0, 0, 'Drafter kit\r\neg kit \r\nEg'),
(125, 'Omega Roller Scale', 'Omega Roller Scale', 80, 60, 'Omega 30cm roll-n-draw ruler', '-', '-', 'EG Kits', 1, 0, 1, 1, 0, 0, 'omega roller scale');

-- --------------------------------------------------------

--
-- Table structure for table `notify_me`
--

CREATE TABLE `notify_me` (
  `Email` text NOT NULL,
  `ID` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` text,
  `Email` text,
  `Mobile` bigint(20) DEFAULT NULL,
  `Address` text,
  `Branch` text,
  `Semester` int(11) DEFAULT NULL,
  `City` text,
  `PayMode` text,
  `Contents` text,
  `Amount` int(11) DEFAULT NULL,
  `OStatus` text,
  `Notified` smallint(6) DEFAULT NULL,
  `Operator` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` text,
  `Email` text,
  `Review` text,
  `Visibility` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ID`, `Date`, `Name`, `Email`, `Review`, `Visibility`) VALUES
(3, '2018-03-10', 'Sanket Bhimani', 'snk.bhimani.jnd@gmail.com', 'Really great UI! Great work... Really appreciate your valuable efforts toward making the Malgadi your best child! :)', 1),
(4, '2018-03-11', 'Nitin', 'nitinprajapati64846@gmail.com', 'Great new UI of malgadi electronics.. good work guys keep it up !..â˜ºï¸', 1),
(5, '2018-03-12', 'Jenil Sadrani', 'sadranijenil@gmail.com', 'Really awsome UI. Keep it up guys. ', 1),
(2, '2018-03-10', 'Kirtan Dudhatra', 'kirtandudhatra@ymail.com', 'Awesome work.....congrats new team', 1),
(6, '2018-03-12', 'Utsav sanghvi', 'utsavsanghvi7@gmail.com', 'Grt website.awesome work', 1),
(8, '2018-03-15', 'Tilak Desai', 'tilak19989@gmail.com', 'Amazing website and amazing response from Malgadi.  I really liked your service and particularly your website', 1),
(9, '2018-03-20', 'Kenil Doshi', 'kenildoshi19@yahoo.com', 'Really great UI &amp; website! Great work... Really appreciate your valuable efforts toward making the Malgadi..KEEP it up guys..cost are also reasonable than market..', 1),
(32, '2018-05-01', 'Dr. Kiran', 'kiran.shah15@yahio.co.in', 'Excellent ', 1),
(26, '2018-03-23', 'Raj Jani', 'rjd1995@hotmail.com', 'Awesome design. Great work Parth shah', 1),
(31, '2018-04-13', 'Darsh', 'darsh19974@yahoo.co.in', 'Very happy to see the new website. Really respect the quality work you did!', 1),
(41, '2018-06-28', 'Shanu Maddheshiya', 'shanumaddheshiya@gmail.com', 'Love the way Malgadi is operated and transferred to give a great practical exposure to students. Truly remarkable initiative.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `Month` text,
  `Orders` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`Month`, `Orders`) VALUES
('Mar18', 13),
('Apr18', 6),
('May18', 3),
('Jun18', 0),
('Jul18', 89),
('Aug18', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
