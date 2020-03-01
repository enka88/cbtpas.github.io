<?php defined('BASEPATH') OR exit('No direct script access allowed');

function id_kota(){
	return '';
}

function id_mdl(){
	return '/home/ujian/www/moodle';
}

function id_info(){
	return '&copy; CBT Administration for Moodle by <b><a target="_blank" href="http://fb.me/aiocbt">All in One CBT</a></b>';
}

function id_verr(){
	return 'Ver.3.5-rev.2018.11';
}

function id_jum(){
	return 20;
}

function id_serv(){
	return 'app.aiocbt.com';
}

function id_ruang(){
	return 76;
}

function t_out(){
	return 10;
}

function num2char($num){
	switch ($num){
	case '1': return "A"; break; case '2': return "B"; break; case '3': return "C"; break; case '4': return "D"; break; case '5': return "E"; break; 
	case '6': return "F"; break; case '7': return "G"; break; case '8': return "H"; break; case '9': return "I"; break; case '10': return "J"; break; 
	case '11': return "K"; break; case '12': return "L"; break; case '13': return "M"; break; case '14': return "N"; break; case '15': return "O"; break; 
	case '16': return "P"; break; case '17': return "Q"; break; case '18': return "R"; break; case '19': return "S"; break; case '20': return "T"; break; 
	case '21': return "U"; break; case '22': return "V"; break; case '23': return "W"; break; case '24': return "X"; break;	case '25': return "Y"; break; 
	case '26': return "Z"; break; case '27': return "AA"; break; case '28': return "BB"; break; case '29': return "CC"; break; case '30': return "DD"; break; 
	case '31': return "EE"; break; case '32': return "FF"; break; case '33': return "GG"; break; case '34': return "HH"; break; case '35': return "II"; break; 
	case '36': return "JJ"; break; case '37': return "KK"; break; case '38': return "LL"; break; case '39': return "MM"; break; case '40': return "NN"; break; 
	case '41': return "OO"; break; case '42': return "PP"; break; case '43': return "QQ"; break; case '44': return "RR"; break;	case '45': return "SS"; break; 
	case '46': return "TT"; break; case '47': return "UU"; break; case '48': return "VV"; break; case '49': return "WW"; break; case '50': return "XX"; break; 
	case '51': return "YY"; break; case '52': return "ZZ"; break; case '53': return "AAA"; break; case '54': return "BBB"; break; case '55': return "CCC"; break; 
	case '56': return "DDD"; break; case '57': return "EEE"; break; case '58': return "FFF"; break; case '59': return "GGG"; break; case '60': return "HHH"; break; 
	case '61': return "III"; break; case '62': return "JJJ"; break; case '63': return "KKK"; break; case '64': return "LLL"; break; case '65': return "MMM"; break; 
	case '66': return "NNN"; break; case '67': return "OOO"; break; case '68': return "PPP"; break; case '69': return "QQQ"; break; case '70': return "RRR"; break; 
	case '71': return "SSS"; break; case '72': return "TTT"; break; case '73': return "UUU"; break; case '74': return "VVV"; break; case '75': return "WWW"; break; 
	case '76': return "XXX"; break; case '77': return "YYY"; break; case '78': return "ZZZ";
	}
}