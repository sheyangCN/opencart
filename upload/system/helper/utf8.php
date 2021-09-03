<?php
//namespace Opencart\System\Helper;
if (extension_loaded('mbstring')) {
	mb_internal_encoding('UTF-8');

	function utf8_strlen($string) {
		return mb_strlen($string);
	}

	function utf8_strpos($string, $needle, $offset = 0) {
		return mb_strpos($string, $needle, $offset);
	}

	function utf8_strrpos($string, $needle, $offset = 0) {
		return mb_strrpos($string, $needle, $offset);
	}

	function utf8_substr($string, $offset, $length = '') {
		if ($length === '') {
			return mb_substr($string, $offset, utf8_strlen($string));
		} else {
			return mb_substr($string, $offset, $length);
		}
	}

	function utf8_strtoupper($string) {
		return mb_strtoupper($string);
	}

	function utf8_strtolower($string) {
		return mb_strtolower($string);
	}


} elseif (function_exists('iconv')) {
	function utf8_strlen($string) {
		return iconv_strlen($string, 'UTF-8');
	}

	function utf8_strpos($string, $needle, $offset = 0) {
		return iconv_strpos($string, $needle, $offset, 'UTF-8');
	}

	function utf8_strrpos($string, $needle) {
		return iconv_strrpos($string, $needle, 'UTF-8');
	}

	function utf8_substr($string, $offset, $length = '') {
		if ($length === '') {
			return iconv_substr($string, $offset, utf8_strlen($string), 'UTF-8');
		} else {
			return iconv_substr($string, $offset, $length, 'UTF-8');
		}
	}

	function utf8_strtolower($string) {
		static $upper_to_lower;

		if ($upper_to_lower == null) {
			$upper_to_lower = [
				0x0041 => 0x0061,
				0x03a6 => 0x03c6,
				0x0162 => 0x0163,
				0x00c5 => 0x00e5,
				0x0042 => 0x0062,
				0x0139 => 0x013a,
				0x00c1 => 0x00e1,
				0x0141 => 0x0142,
				0x038e => 0x03cd,
				0x0100 => 0x0101,
				0x0490 => 0x0491,
				0x0394 => 0x03b4,
				0x015a => 0x015b,
				0x0044 => 0x0064,
				0x0393 => 0x03b3,
				0x00d4 => 0x00f4,
				0x042a => 0x044a,
				0x0419 => 0x0439,
				0x0112 => 0x0113,
				0x041c => 0x043c,
				0x015e => 0x015f,
				0x0143 => 0x0144,
				0x00ce => 0x00ee,
				0x040e => 0x045e,
				0x042f => 0x044f,
				0x039a => 0x03ba,
				0x0154 => 0x0155,
				0x0049 => 0x0069,
				0x0053 => 0x0073,
				0x1e1e => 0x1e1f,
				0x0134 => 0x0135,
				0x0427 => 0x0447,
				0x03a0 => 0x03c0,
				0x0418 => 0x0438,
				0x00d3 => 0x00f3,
				0x0420 => 0x0440,
				0x0404 => 0x0454,
				0x0415 => 0x0435,
				0x0429 => 0x0449,
				0x014a => 0x014b,
				0x0411 => 0x0431,
				0x0409 => 0x0459,
				0x1e02 => 0x1e03,
				0x00d6 => 0x00f6,
				0x00d9 => 0x00f9,
				0x004e => 0x006e,
				0x0401 => 0x0451,
				0x03a4 => 0x03c4,
				0x0423 => 0x0443,
				0x015c => 0x015d,
				0x0403 => 0x0453,
				0x03a8 => 0x03c8,
				0x0158 => 0x0159,
				0x0047 => 0x0067,
				0x00c4 => 0x00e4,
				0x0386 => 0x03ac,
				0x0389 => 0x03ae,
				0x0166 => 0x0167,
				0x039e => 0x03be,
				0x0164 => 0x0165,
				0x0116 => 0x0117,
				0x0108 => 0x0109,
				0x0056 => 0x0076,
				0x00de => 0x00fe,
				0x0156 => 0x0157,
				0x00da => 0x00fa,
				0x1e60 => 0x1e61,
				0x1e82 => 0x1e83,
				0x00c2 => 0x00e2,
				0x0118 => 0x0119,
				0x0145 => 0x0146,
				0x0050 => 0x0070,
				0x0150 => 0x0151,
				0x042e => 0x044e,
				0x0128 => 0x0129,
				0x03a7 => 0x03c7,
				0x013d => 0x013e,
				0x0422 => 0x0442,
				0x005a => 0x007a,
				0x0428 => 0x0448,
				0x03a1 => 0x03c1,
				0x1e80 => 0x1e81,
				0x016c => 0x016d,
				0x00d5 => 0x00f5,
				0x0055 => 0x0075,
				0x0176 => 0x0177,
				0x00dc => 0x00fc,
				0x1e56 => 0x1e57,
				0x03a3 => 0x03c3,
				0x041a => 0x043a,
				0x004d => 0x006d,
				0x016a => 0x016b,
				0x0170 => 0x0171,
				0x0424 => 0x0444,
				0x00cc => 0x00ec,
				0x0168 => 0x0169,
				0x039f => 0x03bf,
				0x004b => 0x006b,
				0x00d2 => 0x00f2,
				0x00c0 => 0x00e0,
				0x0414 => 0x0434,
				0x03a9 => 0x03c9,
				0x1e6a => 0x1e6b,
				0x00c3 => 0x00e3,
				0x042d => 0x044d,
				0x0416 => 0x0436,
				0x01a0 => 0x01a1,
				0x010c => 0x010d,
				0x011c => 0x011d,
				0x00d0 => 0x00f0,
				0x013b => 0x013c,
				0x040f => 0x045f,
				0x040a => 0x045a,
				0x00c8 => 0x00e8,
				0x03a5 => 0x03c5,
				0x0046 => 0x0066,
				0x00dd => 0x00fd,
				0x0043 => 0x0063,
				0x021a => 0x021b,
				0x00ca => 0x00ea,
				0x0399 => 0x03b9,
				0x0179 => 0x017a,
				0x00cf => 0x00ef,
				0x01af => 0x01b0,
				0x0045 => 0x0065,
				0x039b => 0x03bb,
				0x0398 => 0x03b8,
				0x039c => 0x03bc,
				0x040c => 0x045c,
				0x041f => 0x043f,
				0x042c => 0x044c,
				0x1ef2 => 0x1ef3,
				0x0048 => 0x0068,
				0x00cb => 0x00eb,
				0x0110 => 0x0111,
				0x0413 => 0x0433,
				0x012e => 0x012f,
				0x00c6 => 0x00e6,
				0x0058 => 0x0078,
				0x0160 => 0x0161,
				0x016e => 0x016f,
				0x0391 => 0x03b1,
				0x0407 => 0x0457,
				0x0172 => 0x0173,
				0x0178 => 0x00ff,
				0x004f => 0x006f,
				0x041b => 0x043b,
				0x0395 => 0x03b5,
				0x0425 => 0x0445,
				0x0120 => 0x0121,
				0x017d => 0x017e,
				0x017b => 0x017c,
				0x0396 => 0x03b6,
				0x0392 => 0x03b2,
				0x0388 => 0x03ad,
				0x1e84 => 0x1e85,
				0x0174 => 0x0175,
				0x0051 => 0x0071,
				0x0417 => 0x0437,
				0x1e0a => 0x1e0b,
				0x0147 => 0x0148,
				0x0104 => 0x0105,
				0x0408 => 0x0458,
				0x014c => 0x014d,
				0x00cd => 0x00ed,
				0x0059 => 0x0079,
				0x010a => 0x010b,
				0x038f => 0x03ce,
				0x0052 => 0x0072,
				0x0410 => 0x0430,
				0x0405 => 0x0455,
				0x0402 => 0x0452,
				0x0126 => 0x0127,
				0x0136 => 0x0137,
				0x012a => 0x012b,
				0x038a => 0x03af,
				0x042b => 0x044b,
				0x004c => 0x006c,
				0x0397 => 0x03b7,
				0x0124 => 0x0125,
				0x0218 => 0x0219,
				0x00db => 0x00fb,
				0x011e => 0x011f,
				0x041e => 0x043e,
				0x1e40 => 0x1e41,
				0x039d => 0x03bd,
				0x0106 => 0x0107,
				0x03ab => 0x03cb,
				0x0426 => 0x0446,
				0x00c7 => 0x00e7,
				0x03aa => 0x03ca,
				0x0421 => 0x0441,
				0x0412 => 0x0432,
				0x010e => 0x010f,
				0x00d8 => 0x00f8,
				0x0057 => 0x0077,
				0x011a => 0x011b,
				0x0054 => 0x0074,
				0x004a => 0x006a,
				0x040b => 0x045b,
				0x0406 => 0x0456,
				0x0102 => 0x0103,
				0x00d1 => 0x00f1,
				0x041d => 0x043d,
				0x038c => 0x03cc,
				0x00c9 => 0x00e9,
				0x0122 => 0x0123
			];
		}

		$unicode = utf8_to_unicode($string);

		if (!$unicode) {
			return false;
		}

		for ($i = 0; $i < count($unicode); $i++) {
			if (isset($upper_to_lower[$unicode[$i]])) {
				$unicode[$i] = $upper_to_lower[$unicode[$i]];
			}
		}

		return unicode_to_utf8($unicode);
	}

	function utf8_strtoupper($string) {
		static $lower_to_upper;

		if ($lower_to_upper == null) {
			$lower_to_upper = [
				0x0061 => 0x0041,
				0x03c6 => 0x03a6,
				0x0163 => 0x0162,
				0x00e5 => 0x00c5,
				0x0062 => 0x0042,
				0x013a => 0x0139,
				0x00e1 => 0x00c1,
				0x0142 => 0x0141,
				0x03cd => 0x038e,
				0x0101 => 0x0100,
				0x0491 => 0x0490,
				0x03b4 => 0x0394,
				0x015b => 0x015a,
				0x0064 => 0x0044,
				0x03b3 => 0x0393,
				0x00f4 => 0x00d4,
				0x044a => 0x042a,
				0x0439 => 0x0419,
				0x0113 => 0x0112,
				0x043c => 0x041c,
				0x015f => 0x015e,
				0x0144 => 0x0143,
				0x00ee => 0x00ce,
				0x045e => 0x040e,
				0x044f => 0x042f,
				0x03ba => 0x039a,
				0x0155 => 0x0154,
				0x0069 => 0x0049,
				0x0073 => 0x0053,
				0x1e1f => 0x1e1e,
				0x0135 => 0x0134,
				0x0447 => 0x0427,
				0x03c0 => 0x03a0,
				0x0438 => 0x0418,
				0x00f3 => 0x00d3,
				0x0440 => 0x0420,
				0x0454 => 0x0404,
				0x0435 => 0x0415,
				0x0449 => 0x0429,
				0x014b => 0x014a,
				0x0431 => 0x0411,
				0x0459 => 0x0409,
				0x1e03 => 0x1e02,
				0x00f6 => 0x00d6,
				0x00f9 => 0x00d9,
				0x006e => 0x004e,
				0x0451 => 0x0401,
				0x03c4 => 0x03a4,
				0x0443 => 0x0423,
				0x015d => 0x015c,
				0x0453 => 0x0403,
				0x03c8 => 0x03a8,
				0x0159 => 0x0158,
				0x0067 => 0x0047,
				0x00e4 => 0x00c4,
				0x03ac => 0x0386,
				0x03ae => 0x0389,
				0x0167 => 0x0166,
				0x03be => 0x039e,
				0x0165 => 0x0164,
				0x0117 => 0x0116,
				0x0109 => 0x0108,
				0x0076 => 0x0056,
				0x00fe => 0x00de,
				0x0157 => 0x0156,
				0x00fa => 0x00da,
				0x1e61 => 0x1e60,
				0x1e83 => 0x1e82,
				0x00e2 => 0x00c2,
				0x0119 => 0x0118,
				0x0146 => 0x0145,
				0x0070 => 0x0050,
				0x0151 => 0x0150,
				0x044e => 0x042e,
				0x0129 => 0x0128,
				0x03c7 => 0x03a7,
				0x013e => 0x013d,
				0x0442 => 0x0422,
				0x007a => 0x005a,
				0x0448 => 0x0428,
				0x03c1 => 0x03a1,
				0x1e81 => 0x1e80,
				0x016d => 0x016c,
				0x00f5 => 0x00d5,
				0x0075 => 0x0055,
				0x0177 => 0x0176,
				0x00fc => 0x00dc,
				0x1e57 => 0x1e56,
				0x03c3 => 0x03a3,
				0x043a => 0x041a,
				0x006d => 0x004d,
				0x016b => 0x016a,
				0x0171 => 0x0170,
				0x0444 => 0x0424,
				0x00ec => 0x00cc,
				0x0169 => 0x0168,
				0x03bf => 0x039f,
				0x006b => 0x004b,
				0x00f2 => 0x00d2,
				0x00e0 => 0x00c0,
				0x0434 => 0x0414,
				0x03c9 => 0x03a9,
				0x1e6b => 0x1e6a,
				0x00e3 => 0x00c3,
				0x044d => 0x042d,
				0x0436 => 0x0416,
				0x01a1 => 0x01a0,
				0x010d => 0x010c,
				0x011d => 0x011c,
				0x00f0 => 0x00d0,
				0x013c => 0x013b,
				0x045f => 0x040f,
				0x045a => 0x040a,
				0x00e8 => 0x00c8,
				0x03c5 => 0x03a5,
				0x0066 => 0x0046,
				0x00fd => 0x00dd,
				0x0063 => 0x0043,
				0x021b => 0x021a,
				0x00ea => 0x00ca,
				0x03b9 => 0x0399,
				0x017a => 0x0179,
				0x00ef => 0x00cf,
				0x01b0 => 0x01af,
				0x0065 => 0x0045,
				0x03bb => 0x039b,
				0x03b8 => 0x0398,
				0x03bc => 0x039c,
				0x045c => 0x040c,
				0x043f => 0x041f,
				0x044c => 0x042c,
				0x1ef3 => 0x1ef2,
				0x0068 => 0x0048,
				0x00eb => 0x00cb,
				0x0111 => 0x0110,
				0x0433 => 0x0413,
				0x012f => 0x012e,
				0x00e6 => 0x00c6,
				0x0078 => 0x0058,
				0x0161 => 0x0160,
				0x016f => 0x016e,
				0x03b1 => 0x0391,
				0x0457 => 0x0407,
				0x0173 => 0x0172,
				0x00ff => 0x0178,
				0x006f => 0x004f,
				0x043b => 0x041b,
				0x03b5 => 0x0395,
				0x0445 => 0x0425,
				0x0121 => 0x0120,
				0x017e => 0x017d,
				0x017c => 0x017b,
				0x03b6 => 0x0396,
				0x03b2 => 0x0392,
				0x03ad => 0x0388,
				0x1e85 => 0x1e84,
				0x0175 => 0x0174,
				0x0071 => 0x0051,
				0x0437 => 0x0417,
				0x1e0b => 0x1e0a,
				0x0148 => 0x0147,
				0x0105 => 0x0104,
				0x0458 => 0x0408,
				0x014d => 0x014c,
				0x00ed => 0x00cd,
				0x0079 => 0x0059,
				0x010b => 0x010a,
				0x03ce => 0x038f,
				0x0072 => 0x0052,
				0x0430 => 0x0410,
				0x0455 => 0x0405,
				0x0452 => 0x0402,
				0x0127 => 0x0126,
				0x0137 => 0x0136,
				0x012b => 0x012a,
				0x03af => 0x038a,
				0x044b => 0x042b,
				0x006c => 0x004c,
				0x03b7 => 0x0397,
				0x0125 => 0x0124,
				0x0219 => 0x0218,
				0x00fb => 0x00db,
				0x011f => 0x011e,
				0x043e => 0x041e,
				0x1e41 => 0x1e40,
				0x03bd => 0x039d,
				0x0107 => 0x0106,
				0x03cb => 0x03ab,
				0x0446 => 0x0426,
				0x00e7 => 0x00c7,
				0x03ca => 0x03aa,
				0x0441 => 0x0421,
				0x0432 => 0x0412,
				0x010f => 0x010e,
				0x00f8 => 0x00d8,
				0x0077 => 0x0057,
				0x011b => 0x011a,
				0x0074 => 0x0054,
				0x006a => 0x004a,
				0x045b => 0x040b,
				0x0456 => 0x0406,
				0x0103 => 0x0102,
				0x00f1 => 0x00d1,
				0x043d => 0x041d,
				0x03cc => 0x038c,
				0x00e9 => 0x00c9,
				0x0123 => 0x0122
			];
		}

		$unicode = utf8_to_unicode($string);

		if (!$unicode) {
			return false;
		}

		for ($i = 0; $i < count($unicode); $i++) {
			if (isset($lower_to_upper[$unicode[$i]])) {
				$unicode[$i] = $lower_to_upper[$unicode[$i]];
			}
		}

		return unicode_to_utf8($unicode);
	}

	function utf8_to_unicode($string) {
		$unicode = [];

		for ($i = 0; $i < strlen($string); $i++) {
			$chr = ord($string[$i]);

			if ($chr >= 0 && $chr <= 127) {
				$unicode[] = (ord($string[$i]) * pow(64, 0));
			}

			if ($chr >= 192 && $chr <= 223) {
				$unicode[] = ((ord($string[$i]) - 192) * pow(64, 1) + (ord($string[$i + 1]) - 128) * pow(64, 0));
			}

			if ($chr >= 224 && $chr <= 239) {
				$unicode[] = ((ord($string[$i]) - 224) * pow(64, 2) + (ord($string[$i + 1]) - 128) * pow(64, 1) + (ord($string[$i + 2]) - 128) * pow(64, 0));
			}

			if ($chr >= 240 && $chr <= 247) {
				$unicode[] = ((ord($string[$i]) - 240) * pow(64, 3) + (ord($string[$i + 1]) - 128) * pow(64, 2) + (ord($string[$i + 2]) - 128) * pow(64, 1) + (ord($string[$i + 3]) - 128) * pow(64, 0));
			}

			if ($chr >= 248 && $chr <= 251) {
				$unicode[] = ((ord($string[$i]) - 248) * pow(64, 4) + (ord($string[$i + 1]) - 128) * pow(64, 3) + (ord($string[$i + 2]) - 128) * pow(64, 2) + (ord($string[$i + 3]) - 128) * pow(64, 1) + (ord($string[$i + 4]) - 128) * pow(64, 0));
			}

			if ($chr == 252 || $chr == 253) {
				$unicode[] = ((ord($string[$i]) - 252) * pow(64, 5) + (ord($string[$i + 1]) - 128) * pow(64, 4) + (ord($string[$i + 2]) - 128) * pow(64, 3) + (ord($string[$i + 3]) - 128) * pow(64, 2) + (ord($string[$i + 4]) - 128) * pow(64, 1) + (ord($string[$i + 5]) - 128) * pow(64, 0));
			}
		}

		return $unicode;
	}

	function unicode_to_utf8($unicode) {
		$string = '';

		for ($i = 0; $i < count($unicode); $i++) {
			if ($unicode[$i] < 128) {
				$string .= chr($unicode[$i]);
			}

			if ($unicode[$i] >= 128 && $unicode[$i] <= 2047) {
				$string .= chr(($unicode[$i] / 64) + 192) . chr(($unicode[$i] % 64) + 128);
			}

			if ($unicode[$i] >= 2048 && $unicode[$i] <= 65535) {
				$string .= chr(($unicode[$i] / 4096) + 224) . chr(128 + (($unicode[$i] / 64) % 64)) . chr(($unicode[$i] % 64) + 128);
			}

			if ($unicode[$i] >= 65536 && $unicode[$i] <= 2097151) {
				$string .= chr(($unicode[$i] / 262144) + 240) . chr((($unicode[$i] / 4096) % 64) + 128) . chr((($unicode[$i] / 64) % 64) + 128) . chr(($unicode[$i] % 64) + 128);
			}

			if ($unicode[$i] >= 2097152 && $unicode[$i] <= 67108863) {
				$string .= chr(($unicode[$i] / 16777216) + 248) . chr((($unicode[$i] / 262144) % 64) + 128) . chr((($unicode[$i] / 4096) % 64) + 128) . chr((($unicode[$i] / 64) % 64) + 128) . chr(($unicode[$i] % 64) + 128);
			}

			if ($unicode[$i] >= 67108864 && $unicode[$i] <= 2147483647) {
				$string .= chr(($unicode[$i] / 1073741824) + 252) . chr((($unicode[$i] / 16777216) % 64) + 128) . chr((($unicode[$i] / 262144) % 64) + 128) . chr(128 + (($unicode[$i] / 4096) % 64)) . chr((($unicode[$i] / 64) % 64) + 128) . chr(($unicode[$i] % 64) + 128);
			}
		}

		return $string;
	}
}
