var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

var defCap0 = "- Add new game";
var defCap1 = "- Remove this game";
var defTitle= "myGame "
var cookName = "minicliptoolbarsession";
var msg_noplace = "There is no space to add more Miniclips, use the \"Edit My Miniclips...\" function to make space for new games.";

var gameurl= new Array();
var gametit= new Array();

gametit[0] = ""; 		 				gameurl[0] = "";

gametit[1] = "3_Foot_Ninja"; 				gameurl[1] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/ninja.htm";
gametit[2] = "3_Foot_Ninja_II"; 			gameurl[2] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/ninja2.htm";
gametit[3] = "3D_Net_Blazer"; 			gameurl[3] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/basketball.htm";

gametit[4] = "Acnos_Energizer"; 			gameurl[4] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com//acno/acno.htm";
gametit[5] = "Adventure_Elf"; 			gameurl[5] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/adventureelf.htm";
gametit[6] = "Alien_Abduction"; 			gameurl[6] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/alienabduction/alienabduction.htm";
gametit[7] = "Alien_Attack"; 				gameurl[7] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/alienattack.htm";
gametit[8] = "Alien_Clones"; 				gameurl[8] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/clones.htm";
gametit[9] = "All_Out"; 				gameurl[9] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/allout.htm";
gametit[10] = "Alpine_Escape";			gameurl[10] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/alpine.htm";

gametit[12] = "Aqua_Energizer"; 			gameurl[12] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/aqua.htm";
gametit[13] = "Ask_Joe"; 				gameurl[13] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/askjoe.htm";

gametit[14] = "Backgammon"; 				gameurl[14] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=backgammon";
gametit[15] = "Badaboom";				gameurl[15] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/badaboom.htm";
gametit[16] = "Bad_Apple"; 				gameurl[16] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/badapple.htm";
gametit[17] = "Biscuit";				gameurl[17] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/biscuit.htm";
gametit[18] = "Baseball"; 				gameurl[18] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/baseball.htm";
gametit[19] = "Battle_Pong";				gameurl[19] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/battlepong.htm";
gametit[20] = "Battleships"; 				gameurl[20] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/battleships.htm";
gametit[21] = "Beach_Tennis";				gameurl[21] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/memberblock.htm";
gametit[22] = "Bean_Hunter"; 				gameurl[22] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bean.htm";
gametit[23] = "Bears_and_Bees";			gameurl[23] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bearsandbees.htm";
gametit[24] = "Beckham_Goldenballs"; 		gameurl[24] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/goldenballs.htm";
gametit[25] = "Best_Friends";				gameurl[25] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bestfriends/bestfriends.htm";
gametit[26] = "Blackjack"; 				gameurl[26] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/blackjack.htm";
gametit[27] = "Blackjack_Elf";			gameurl[27] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/blackjackelf.htm";
gametit[28] = "Blair_the_Motivator"; 		gameurl[28] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/motivator.htm";
gametit[29] = "Blobs";					gameurl[29] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/blobs.htm";
gametit[30] = "Blobs_2"; 				gameurl[30] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/blobs2.htm";
gametit[31] = "Blox_Forever";				gameurl[31] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bloxforever.htm";
gametit[32] = "Board"; 					gameurl[32] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/board.htm";
gametit[33] = "Boom_Boom_Volleyball";		gameurl[33] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/boomboom.htm";

gametit[34] = "Cable_Capers_2";			gameurl[34] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cable.htm";
gametit[35] = "Cannon_Blast";				gameurl[35] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cannonblast.htm";
gametit[36] = "Canyon_Glider";			gameurl[36] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/canyonglider.htm";
gametit[37] = "Carnival_Jackpot";			gameurl[37] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/carnival.htm";
gametit[38] = "Cell_Out";				gameurl[38] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cellout.htm";
gametit[39] = "Chain_Reactor";			gameurl[39] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=chainreactor";
gametit[40] = "Cherie_Disco_Blair";			gameurl[40] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/discocherie.htm";
gametit[41] = "Chess";					gameurl[41] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=chainreactor";
gametit[42] = "Click_and_Slide";			gameurl[42] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/click.htm";
gametit[43] = "Couronne_Deluxe";			gameurl[43] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/couronnedeluxe/index.htm";
gametit[44] = "Cow_in_the_Shaft";			gameurl[44] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cits/cow.htm";
gametit[45] = "Crashdown";				gameurl[45] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/crashdown.htm";
gametit[46] = "Crypt_Raider";				gameurl[46] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/crypt/cryptraider.htm";
gametit[47] = "Cubebuster";				gameurl[47] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cubebuster.htm";
gametit[48] = "Cybermice_Party";			gameurl[48] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/cybermiceparty.htm";

gametit[49] = "Dancing_Blair";			gameurl[49] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/dancingblair.htm";
gametit[50] = "Dancing_Bush";				gameurl[50] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/dancingbush.htm";
gametit[51] = "Dancing_Hillary";			gameurl[51] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/dancinghillary.htm";
gametit[52] = "Da_Numba";				gameurl[52] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/danumba.htm";
gametit[53] = "Defenders";				gameurl[53] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/defenders.htm";
gametit[54] = "Detonator";				gameurl[54] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/detonator.htm";
gametit[56] = "Field_Goal";				gameurl[55] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/fieldgoal.htm";
gametit[57] = "First_2_Zero_Darts";			gameurl[56] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/darts/darts.htm.htm";
gametit[58] = "Flashman";				gameurl[58] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/flashman.htm";
gametit[59] = "Formula_G1";				gameurl[59] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/formulag1.htm";
gametit[60] = "Fowl_Words";				gameurl[60] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/fowlwords.htm";
gametit[61] = "Fowl_Words_2";				gameurl[61] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/fowlwords2.htm";
gametit[62] = "Free_Kick_Challenge";		gameurl[62] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/freekickchallenge.htm";
gametit[63] = "Frendz";					gameurl[63] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/frendz.htm";
gametit[64] = "Fruit_Smash";				gameurl[64] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/fruitsmash.htm";

gametit[65] = "Galactic_Goobers";			gameurl[65] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/goobers.htm";
gametit[66] = "Galactic_Warrior";			gameurl[66] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/warrior.htm";
gametit[67] = "Gravity";				gameurl[67] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/gravity.htm";
gametit[68] = "Gutterball";				gameurl[68] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/gutterball/gutterball.htm";

gametit[69] = "Hang_A_Roo";				gameurl[69] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hangaroo.htm";
gametit[70] = "Hang_A_Roo_2";				gameurl[70] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hangaroo2.htm";
gametit[71] = "Harvey_Wallbanger";			gameurl[71] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/harveywallbanger.htm";
gametit[72] = "Heli_Attack_2";			gameurl[72] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/heli2.htm";
gametit[73] = "Hexxagon";				gameurl[73] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hexxagon.htm";
gametit[74] = "Hillary";				gameurl[74] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hillary.htm";
gametit[75] = "Hip_Hop_Debate";			gameurl[75] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hiphopdebate.htm";
gametit[76] = "Hockey_Showdown";			gameurl[76] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hockeyshowdown.htm";
gametit[77] = "Horse_Racin";				gameurl[77] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/horse.htm";
gametit[78] = "Hurricane";				gameurl[78] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hurricane/hurricane.htm";

gametit[79] = "Jigsaw_Car";				gameurl[79] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/jigsaw1.htm";
gametit[80] = "Jigsaw_Ocean";				gameurl[80] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/jigsaw2.htm";

gametit[81] = "Keepy_Ups";				gameurl[81] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/keepyups.htm";
gametit[82] = "Kerry_Workout";			gameurl[82] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/kerryworkout.htm";
gametit[83] = "KingPin_Bowling";			gameurl[83] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/tgfgbowling.htm";
gametit[84] = "Last_Christmas_2";			gameurl[84] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/lastxmas.htm";

gametit[85] = "Letter_Lasso";				gameurl[85] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/letterlasso.htm";
gametit[86] = "Letter_Rip";				gameurl[86] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/letterrip.htm";
gametit[87] = "Lunar_Command";			gameurl[87] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/lunarcommand.htm";

gametit[88] = "Magic_Balls";				gameurl[88] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/magic.htm";
gametit[89] = "Mahjongg";				gameurl[89] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/mahjongg.htm";
gametit[90] = "Mancala_Bugs";				gameurl[90] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/mancalabugs.htm";
gametit[91] = "Mars_Patrol";				gameurl[91] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/patrol.htm";
gametit[92] = "Minigolf";				gameurl[92] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/minigolf/minigolf.htm";
gametit[93] = "Minilympics";				gameurl[93] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/minilympics.htm";
gametit[94] = "Mission_Mars";				gameurl[94] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/missionmars.htm";
gametit[95] = "Monkey_Lander";			gameurl[95] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/monkeylander.htm";
gametit[96] = "Monkey_Snowfight";			gameurl[96] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/monkeysnowfight.htm";
gametit[97] = "Monster_Bash";				gameurl[97] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bash.htm";
gametit[98] = "Monster_Sumo";				gameurl[98] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/monsters.htm";

gametit[99] = "Nimian_Flyer";				gameurl[99] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/nimianflyer.htm";

gametit[100] = "Paintball";				gameurl[100] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/paintball.htm";
gametit[101] = "Panik_In_Chocoland";		gameurl[101] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/panik.htm";
gametit[102] = "Park_A_Lot";				gameurl[102] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/park.htm";
gametit[103] = "Park_A_Lot_2";			gameurl[103] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/park2.htm";
gametit[104] = "Peanut";				gameurl[104] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/peanut.htm";
gametit[105] = "Pencak_Silat";			gameurl[105] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pencak.htm";
gametit[106] = "Penguin_Arcade";			gameurl[106] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/penguin.htm";
gametit[107] = "Penguin_Push";			gameurl[107] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/penguinpush.htm";
gametit[108] = "Pharaohs_Tomb";			gameurl[108] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pharaohtomb.htm";
gametit[109] = "Pipedown_3D";				gameurl[109] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pipedown.htm";
gametit[110] = "Pipsoh";				gameurl[110] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pipsoh.htm";
gametit[111] = "Platypus";				gameurl[111] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/platypus/platypus.htm";
gametit[112] = "Polar_Rescue";			gameurl[112] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/polarrescue.htm";
gametit[113] = "Pool_8_Ball";				gameurl[113] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=8ball";
gametit[114] = "Pool_9_Ball";				gameurl[114] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=9ball";
gametit[115] = "Present_Panic";			gameurl[115] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/presentpanic.htm";
gametit[116] = "Pressure_Shot";			gameurl[116] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pressureshot.htm";
gametit[117] = "Presidential_Knockout";		gameurl[117] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/knockout.htm";

gametit[118] = "Quadrow";				gameurl[118] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=quadrow";

gametit[119] = "Radical_Aces";			gameurl[119] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/aces/index.htm";
gametit[120] = "Real_Space_2";			gameurl[120] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/realspace2/realspace2.htm";
gametit[121] = "Red_Beard";				gameurl[121] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/redbeard.htm";
gametit[122] = "Rigelian_Hotshots";			gameurl[122] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/rigelianhotshots.htm";
gametit[123] = "Rocketman";				gameurl[123] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/rocketman.htm";
gametit[124] = "RockStarter";				gameurl[124] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/rockstarter/rockstarter.htm";
gametit[125] = "Rollercoaster";			gameurl[125] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/fantasyrollercoaster/rollercoaster.htm";
gametit[126] = "RollOn";				gameurl[126] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/rollon.htm";
gametit[127] = "Rugby";					gameurl[127] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/rugby.htm";
gametit[128] = "Rule_The_Beach";			gameurl[128] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/rulethebeach.htm";
gametit[129] = "RuneScape";				gameurl[129] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/runescape_game.html";
gametit[130] = "Rural_Racer";				gameurl[130] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/ruralracer.htm";

gametit[131] = "Samurai_Warrior";			gameurl[131] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/samurai.htm";
gametit[132] = "Santa_Balls";				gameurl[132] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/santaballs.htm";
gametit[133] = "Santas_Factory";			gameurl[133] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/santasfactory.htm";
gametit[134] = "Santa_Ski_Jump";			gameurl[134] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/skijump.htm";
gametit[135] = "Save_The_Sheriff";			gameurl[135] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sheriff.htm";
gametit[136] = "Shark_Bait";				gameurl[136] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/shark.htm";
gametit[137] = "Sheepish";				gameurl[137] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sheepish.htm";
gametit[138] = "Sheep_Game";				gameurl[138] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Sheepgame.htm";
gametit[139] = "Shock_Bowling";			gameurl[139] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Bowl.htm";
gametit[140] = "Shootin_Hoops";			gameurl[140] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bball.htm";
gametit[141] = "Shootout_2";				gameurl[141] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/shootout2.htm";
gametit[142] = "Shove_It";				gameurl[142] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/shoveit.htm";
gametit[143] = "Simon_Says";				gameurl[143] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/simon.htm";
gametit[144] = "Sketchy";				gameurl[144] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sketchy.htm";
gametit[145] = "Slacking";				gameurl[145] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/slackers.htm";
gametit[146] = "Slingshot";				gameurl[146] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/slingshot.htm";
gametit[147] = "Smashing";				gameurl[147] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/smashing.htm";
gametit[148] = "Snake";					gameurl[148] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/snake.htm";
gametit[149] = "Sniper";				gameurl[149] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sniper.htm";
gametit[150] = "Snowboarding_XS";			gameurl[150] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/snowboardingxs.htm";
gametit[151] = "Snowfight_3D";			gameurl[151] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/snowfight.htm";
gametit[152] = "Soap_Bubble";				gameurl[152] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/soap.htm";
gametit[153] = "Space_Fighter";			gameurl[153] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/spacefighter.htm";
gametit[154] = "Space_Invaders";			gameurl[154] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/spaceinvaders.htm";
gametit[155] = "Spank_The_Frank";			gameurl[155] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/frank.htm";
gametit[156] = "SQRL_Golf";				gameurl[156] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sqrlgolf.htm";
gametit[157] = "SQRL_Golf_2";				gameurl[157] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sqrlgolf2.htm";
gametit[158] = "Squigly_Fish_Racer";		gameurl[158] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/squigly.htm";
gametit[159] = "Stan_Skateboarding";		gameurl[159] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/stan.htm";
gametit[160] = "Starship_Eleven";			gameurl[160] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/starshipeleven.htm";
gametit[161] = "Starship_Seven";			gameurl[161] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/starshipseven.htm";
gametit[162] = "StarWars_Swappers";			gameurl[162] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/starwars.htm";
gametit[163] = "Sub_Hunt";				gameurl[163] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=subhunt";
gametit[164] = "Superbike_GP";			gameurl[164] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/superbike.htm";
gametit[165] = "Superfighter";			gameurl[165] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/superfighter.htm";
gametit[166] = "Surfs_Up";				gameurl[166] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/surf.htm";
gametit[167] = "Sveerz";				gameurl[167] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/sveerz/sveerz.htm.htm";

gametit[168] = "Table_Tennis";			gameurl[168] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/tabletennis.htm";
gametit[169] = "Tennis_Ace";				gameurl[169] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/tennisace.htm";
gametit[170] = "Tetris";				gameurl[170] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/tetris.htm";
gametit[171] = "The_Old_West";			gameurl[171] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/shootout.htm";
gametit[172] = "Topsy_Turvey";			gameurl[172] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/topsyturvy.htm";
gametit[173] = "Trapshoot";				gameurl[173] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trapshoot.htm";
gametit[174] = "Trial_Bike";				gameurl[174] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trialbike.htm";
gametit[175] = "Trial_Bike_Pro";			gameurl[175] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trialbikepro.htm";
gametit[176] = "Trial_Bike_Bundle";			gameurl[176] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trialbikebundle.htm";
gametit[177] = "Twiddlestix";				gameurl[177] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/twiddlestix.htm";

gametit[178] = "United_We_Dance";			gameurl[178] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/unitedwedance.htm";

gametit[179] = "Vertigolf";				gameurl[179] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/vertigolf.htm";

gametit[180] = "Wakeboarding_XS";			gameurl[180] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/wakeboarding.htm";
gametit[181] = "War_on_Terrorism";			gameurl[181] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/waronterrorism.htm";
gametit[182] = "War_on_Terrorism_2";		gameurl[182] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/wot2.htm";
gametit[183] = "Wack_a_Groung_Hog";			gameurl[183] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/wack.htm";
gametit[184] = "Western";				gameurl[184] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/western.htm";
gametit[185] = "Wack_a_Nerd";				gameurl[185] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/wackanerd.htm";
gametit[186] = "White_House_Joust";			gameurl[186] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/joust.htm";
gametit[187] = "Wordo";					gameurl[187] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/wordo.htm";
gametit[188] = "World_Cup_Football";		gameurl[188] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/football/start.html";

gametit[189] = "Zed";					gameurl[189] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/zed.htm";
gametit[190] = "Shrunken_Heads";			gameurl[190] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/shrunkenheads.htm";
gametit[191] = "Trick_or_Treat_Smash";		gameurl[191] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trickortreatsmash.htm";

gametit[192] = "Bomb_Jack";				gameurl[192] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bomb.htm";
gametit[193] = "Bubble_Pop";				gameurl[193] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bubblepop.htm";
gametit[194] = "Bubble_Trouble";			gameurl[194] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bubbletrouble.htm";
gametit[195] = "Bug_on_a_Wire";			gameurl[195] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bug.htm";
gametit[196] = "Bullseye";				gameurl[196] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bullseye.htm";
gametit[197] = "Bunch";					gameurl[197] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bunch.htm";
gametit[198] = "Bush_Aerobics";			gameurl[198] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bushaerobics.htm";
gametit[199] = "Bush_Royal_Rampage";		gameurl[199] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bushrr.htm";
gametit[200] = "Bush_Shoot_Out";			gameurl[200] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/bushshootout.htm";
gametit[201] = "Puzzled_Sheep";			gameurl[201] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/puzzledsheep.htm";
gametit[202] = "Crimson_Viper";			gameurl[202] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/crimsonviper/crimsonviper.htm";
gametit[203] = "Robot_Rage";				gameurl[203] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/robotrage.htm";
gametit[204] = "Sub_Commander";			gameurl[204] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/subcommander.htm";
gametit[205] = "Electro_Air_Hockey";		gameurl[205] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/airhockey.htm";
gametit[206] = "Hamster_Ball";			gameurl[206] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hamsterball/hamsterball.htm";
gametit[207] = "Alex_In_Danger";			gameurl[207] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/alexindanger.htm";
gametit[208] = "Flip_Words";				gameurl[208] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/flipwords/flipwords.htm";
gametit[209] = "Trials_Construction_Yard";	gameurl[209] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/trialscy/trialscy.htm";
gametit[210] = "Skidoo";				gameurl[210] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/skidoo.htm";
gametit[211] = "Ice_Breakout";			gameurl[211] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/icebreakout.htm";
gametit[212] = "Last_Christmas_2";			gameurl[212] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/Flash/lastxmas.htm";
gametit[213] = "Santas_Sack";				gameurl[213] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/emptysantassack.htm";
gametit[214] = "Nordic_Chill";			gameurl[214] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/nordicchill.htm";
gametit[215] = "PengaPop";				gameurl[215] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/pengapop.htm";
gametit[216] = "Most_Wanted";				gameurl[216] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/mostwanted/mostwanted.htm";
gametit[217] = "Verti_Golf_2";			gameurl[217] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/vertigolf2/vertigolf2.htm";
gametit[218] = "Puzzle Pirates";			gameurl[218] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/puzzlepirates/puzzlepirates.htm";
gametit[219] = "Hostile Skies";			gameurl[219] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/hostileskies.htm";
gametit[220] = "Secret_Of_Maya";			gameurl[220] = "https://web.archive.org/web/20050205025623/http://www.miniclip-tournaments.com/index.jsp?game=secretofmaya";
gametit[221] = "Mahjong_Medley";			gameurl[221] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/mahjong/mahjong.htm";
gametit[222] = "Reversi";			gameurl[222] = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/mahjong/mahjong.htm";

gametit[223] = defCap1; 				gameurl[223] = "";


var Maxgame = (gametit.length - 1);

function GetCookie(name) {
 var dcookie = document.cookie;
 var cname = name + "=";
 var clen = dcookie.length;
 var cbegin = 0;
     while (cbegin < clen) {
     var vbegin = cbegin + cname.length;
         if (dcookie.substring(cbegin, vbegin) == cname) { 
         var vend = dcookie.indexOf (";", vbegin);
             if (vend == -1) vend = clen;
         return unescape(dcookie.substring(vbegin, vend));
         }
     cbegin = dcookie.indexOf(" ", cbegin) + 1;
         if (cbegin == 0) break;
     }
 return "";
}

function QueryStringCookie(aStr, aPar){
  var begin,end;
  if(aStr.length>1)
  {
    begin = aStr.indexOf(aPar);
    if (begin<0) {return("");};
    begin = begin + aPar.length;
    end=aStr.indexOf("~", begin);
    if (end==(-1))
      end=aStr.length;
    return(aStr.substring(begin,end));
  }
  else return("");
}

function updateToolbar(){
	var checkSystemForUpdate = checkSystem();
	if(checkSystemForUpdate == "WIN_IE_XP2" || checkSystemForUpdate == "WIN_IE"){
		var url = "https://web.archive.org/web/20050205025623/http://www.donotchangeme.com/?bar=minicliptoolbar&command=reloadbar";
		self.top.document.getElementById("iToolbar").src = url;
	}
}

function RefreshToolbar(full, addOrRemove, gameName){
	var thecook = GetCookie("minicliptoolbar_id");
	thecook = thecook.toString();
	if (thecook.length > 5){
		updateToolbar();
		if (full==1){
			alert(msg_noplace);
		}else if(addOrRemove == "add"){
			alert(gameName + " has been added to My Miniclips. Click \"My Miniclips\" in the toolbar to use it!");
		}else if(addOrRemove == "remove"){
			alert(gameName + " has been removed from My Miniclips.");	
		}
	}else{
		if(addOrRemove == "add"){
			installBar = confirm("You need Miniclip Toolbar to add this game to My Miniclips. Installing the toolbar is quick, easy and completely FREE.\n\nWould you like to install Miniclip Toolbar now?");
		}else{
			installBar = confirm("You need Miniclip Toolbar to use this feature. Installing the toolbar is quick, easy and completely FREE.\n\nWould you like to install Miniclip Toolbar now?");
		}

		if (installBar == true){
			window.top.location = "https://web.archive.org/web/20050205025623/http://www.miniclip.com/toolbar";
		}
	}
}

function AddGame(thegameid){
		updateToolbar();
		var checkInstallation = GetCookie("minicliptoolbar_id");
		checkInstallation = checkInstallation.toString();

		var thecook = GetCookie(cookName);thecook.toString();
		var regx = new RegExp("gm[0-9]+\\^([\\w\\s]+)\\~","g");
		var regu = new RegExp("ul[0-9]+\\^([\\w\\s]+)\\~","g");
		var tmp = thecook.match(regu);
		var theline = new String();
		
		if (thecook.length < 5){
			theline += "gm1^" + gametit[thegameid] + "~";
			theline += "ur1^" + thegameid + "~";
		}else{
			var tmp = thecook.match(regx);
			totalgame = tmp.length;
			for(i=1;i<Maxgame;i++){
				if (thecook.indexOf("ur" +i +"^" +thegameid +"~") >= 0 && checkInstallation.length > 5){
					gameName = replaceIt(gametit[thegameid],'_',' ');
					alert("The game " + gameName + " is already in the My Miniclips list. Click \"My Miniclips\" in the toolbar to use it!");
					return false;					
				}
				if (thecook.indexOf("gm"+i+"^") < 0){
					theline = thecook;
					theline += "gm" +i +"^" + gametit[thegameid] + "~";
					theline += "ur" +i +"^" + thegameid + "~";
					i = Maxgame + 2	;	
				}
			}
		}

	if(checkInstallation.length > 5){
		SetCookie(cookName,theline,20000);
	}
	gameName = replaceIt(gametit[thegameid],'_',' ');
	RefreshToolbar(0, "add", gameName);
}

function SetCookie (name, value, expires){
	var expdate = new Date ();
	expdate.setTime(expdate.getTime() + (1000 * 60 * 60 * expires));
	document.cookie = name + "=" + escape (value) + "; expires=" + expdate.toGMTString() +  "; path=/";
}

if (addQueuedGame > 0){
	AddGame(addQueuedGame);
}


}
/*
     FILE ARCHIVED ON 02:56:23 Feb 05, 2005 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 10:54:08 Jan 22, 2021.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 105.808
  esindex: 0.013
  RedisCDXSource: 5.031
  PetaboxLoader3.datanode: 929.106 (4)
  exclusion.robots: 0.213
  exclusion.robots.policy: 0.199
  CDXLines.iter: 21.932 (3)
  PetaboxLoader3.resolve: 95.778
  LoadShardBlock: 73.416 (3)
  load_resource: 965.926
*/