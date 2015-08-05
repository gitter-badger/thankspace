<?php

class CountriesTableSeeder extends Seeder {

	public function run()
	{
    // Uncomment the below to wipe the table clean before populating
    DB::table('countries')->truncate();
    
		$countries = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'Andorra',
    'code' => 'AD',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'United Arab Emirates',
    'code' => 'AE',
    'currency' => 'AED',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'Afghanistan',
    'code' => 'AF',
    'currency' => 'AFA',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'Antigua and Barbuda',
    'code' => 'AG',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'Anguilla',
    'code' => 'AI',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'Albania',
    'code' => 'AL',
    'currency' => 'ALL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'Armenia',
    'code' => 'AM',
    'currency' => 'AMD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'Netherlands Antilles',
    'code' => 'AN',
    'currency' => 'ANG',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'Angola',
    'code' => 'AO',
    'currency' => 'AOA',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'Antarctica',
    'code' => 'AQ',
    'currency' => '',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  10 => 
  array (
    'id' => 11,
    'name' => 'Argentina',
    'code' => 'AR',
    'currency' => 'ARS',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  11 => 
  array (
    'id' => 12,
    'name' => 'American Samoa',
    'code' => 'AS',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  12 => 
  array (
    'id' => 13,
    'name' => 'Austria',
    'code' => 'AT',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  13 => 
  array (
    'id' => 14,
    'name' => 'Australia',
    'code' => 'AU',
    'currency' => 'AUD',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  14 => 
  array (
    'id' => 15,
    'name' => 'Aruba',
    'code' => 'AW',
    'currency' => 'AWG',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  15 => 
  array (
    'id' => 16,
    'name' => 'Azerbaijan',
    'code' => 'AZ',
    'currency' => 'AZM',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  16 => 
  array (
    'id' => 17,
    'name' => 'Bosnia and Herzegovina',
    'code' => 'BA',
    'currency' => 'BAM',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  17 => 
  array (
    'id' => 18,
    'name' => 'Barbados',
    'code' => 'BB',
    'currency' => 'BBD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  18 => 
  array (
    'id' => 19,
    'name' => 'Bangladesh',
    'code' => 'BD',
    'currency' => 'BDT',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  19 => 
  array (
    'id' => 20,
    'name' => 'Belgium',
    'code' => 'BE',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  20 => 
  array (
    'id' => 21,
    'name' => 'Burkina Faso',
    'code' => 'BF',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  21 => 
  array (
    'id' => 22,
    'name' => 'Bulgaria',
    'code' => 'BG',
    'currency' => 'BGL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  22 => 
  array (
    'id' => 23,
    'name' => 'Bahrain',
    'code' => 'BH',
    'currency' => 'BHD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  23 => 
  array (
    'id' => 24,
    'name' => 'Burundi',
    'code' => 'BI',
    'currency' => 'BIF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  24 => 
  array (
    'id' => 25,
    'name' => 'Benin',
    'code' => 'BJ',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  25 => 
  array (
    'id' => 26,
    'name' => 'Bermuda',
    'code' => 'BM',
    'currency' => 'BMD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  26 => 
  array (
    'id' => 27,
    'name' => 'Brunei Darussalam',
    'code' => 'BN',
    'currency' => 'BND',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  27 => 
  array (
    'id' => 28,
    'name' => 'Bolivia',
    'code' => 'BO',
    'currency' => 'BOB',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  28 => 
  array (
    'id' => 29,
    'name' => 'Brazil',
    'code' => 'BR',
    'currency' => 'BRL',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  29 => 
  array (
    'id' => 30,
    'name' => 'The Bahamas',
    'code' => 'BS',
    'currency' => 'BSD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  30 => 
  array (
    'id' => 31,
    'name' => 'Bhutan',
    'code' => 'BT',
    'currency' => 'BTN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  31 => 
  array (
    'id' => 32,
    'name' => 'Bouvet Island',
    'code' => 'BV',
    'currency' => 'NOK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  32 => 
  array (
    'id' => 33,
    'name' => 'Botswana',
    'code' => 'BW',
    'currency' => 'BWP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  33 => 
  array (
    'id' => 34,
    'name' => 'Belarus',
    'code' => 'BY',
    'currency' => 'BYR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  34 => 
  array (
    'id' => 35,
    'name' => 'Belize',
    'code' => 'BZ',
    'currency' => 'BZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  35 => 
  array (
    'id' => 36,
    'name' => 'Canada',
    'code' => 'CA',
    'currency' => 'CAD',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  36 => 
  array (
    'id' => 37,
    'name' => 'Cocos (Keeling) Islands',
    'code' => 'CC',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  37 => 
  array (
    'id' => 38,
    'name' => 'Congo, Democratic Republi',
    'code' => 'CD',
    'currency' => 'CDF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  38 => 
  array (
    'id' => 39,
    'name' => 'Central African Republic',
    'code' => 'CF',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  39 => 
  array (
    'id' => 40,
    'name' => 'Congo, Republic of the',
    'code' => 'CG',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  40 => 
  array (
    'id' => 41,
    'name' => 'Switzerland',
    'code' => 'CH',
    'currency' => 'CHF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  41 => 
  array (
    'id' => 42,
    'name' => 'Cote d\'Ivoire',
    'code' => 'CI',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  42 => 
  array (
    'id' => 43,
    'name' => 'Cook Islands',
    'code' => 'CK',
    'currency' => 'NZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  43 => 
  array (
    'id' => 44,
    'name' => 'Chile',
    'code' => 'CL',
    'currency' => 'CLP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  44 => 
  array (
    'id' => 45,
    'name' => 'Cameroon',
    'code' => 'CM',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  45 => 
  array (
    'id' => 46,
    'name' => 'China',
    'code' => 'CN',
    'currency' => 'CNY',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  46 => 
  array (
    'id' => 47,
    'name' => 'Colombia',
    'code' => 'CO',
    'currency' => 'COP',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  47 => 
  array (
    'id' => 48,
    'name' => 'Costa Rica',
    'code' => 'CR',
    'currency' => 'CRC',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  48 => 
  array (
    'id' => 49,
    'name' => 'Cuba',
    'code' => 'CU',
    'currency' => 'CUP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  49 => 
  array (
    'id' => 50,
    'name' => 'Cape Verde',
    'code' => 'CV',
    'currency' => 'CVE',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  50 => 
  array (
    'id' => 51,
    'name' => 'Christmas Island',
    'code' => 'CX',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  51 => 
  array (
    'id' => 52,
    'name' => 'Cyprus',
    'code' => 'CY',
    'currency' => 'CYP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  52 => 
  array (
    'id' => 53,
    'name' => 'Czech Republic',
    'code' => 'CZ',
    'currency' => 'CZK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  53 => 
  array (
    'id' => 54,
    'name' => 'Germany',
    'code' => 'DE',
    'currency' => 'EUR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  54 => 
  array (
    'id' => 55,
    'name' => 'Djibouti',
    'code' => 'DJ',
    'currency' => 'DJF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  55 => 
  array (
    'id' => 56,
    'name' => 'Denmark',
    'code' => 'DK',
    'currency' => 'DKK',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  56 => 
  array (
    'id' => 57,
    'name' => 'Dominica',
    'code' => 'DM',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  57 => 
  array (
    'id' => 58,
    'name' => 'Dominican Republic',
    'code' => 'DO',
    'currency' => 'DOP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  58 => 
  array (
    'id' => 59,
    'name' => 'Algeria',
    'code' => 'DZ',
    'currency' => 'DZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  59 => 
  array (
    'id' => 60,
    'name' => 'Ecuador',
    'code' => 'EC',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  60 => 
  array (
    'id' => 61,
    'name' => 'Estonia',
    'code' => 'EE',
    'currency' => 'EEK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  61 => 
  array (
    'id' => 62,
    'name' => 'Egypt',
    'code' => 'EG',
    'currency' => 'EGP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  62 => 
  array (
    'id' => 63,
    'name' => 'Western Sahara',
    'code' => 'EH',
    'currency' => 'MAD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  63 => 
  array (
    'id' => 64,
    'name' => 'Eritrea',
    'code' => 'ER',
    'currency' => 'ERN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  64 => 
  array (
    'id' => 65,
    'name' => 'Spain',
    'code' => 'ES',
    'currency' => 'EUR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  65 => 
  array (
    'id' => 66,
    'name' => 'Ethiopia',
    'code' => 'ET',
    'currency' => 'ETB',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  66 => 
  array (
    'id' => 67,
    'name' => 'Finland',
    'code' => 'FI',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  67 => 
  array (
    'id' => 68,
    'name' => 'Fiji',
    'code' => 'FJ',
    'currency' => 'FJD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  68 => 
  array (
    'id' => 69,
    'name' => 'Falkland Islands (Islas M',
    'code' => 'FK',
    'currency' => 'FKP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  69 => 
  array (
    'id' => 70,
    'name' => 'Micronesia, Federated Sta',
    'code' => 'FM',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  70 => 
  array (
    'id' => 71,
    'name' => 'Faroe Islands',
    'code' => 'FO',
    'currency' => 'DKK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  71 => 
  array (
    'id' => 72,
    'name' => 'France',
    'code' => 'FR',
    'currency' => 'EUR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  72 => 
  array (
    'id' => 73,
    'name' => 'France, Metropolitan',
    'code' => 'FX',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  73 => 
  array (
    'id' => 74,
    'name' => 'Gabon',
    'code' => 'GA',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  74 => 
  array (
    'id' => 75,
    'name' => 'Grenada',
    'code' => 'GD',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  75 => 
  array (
    'id' => 76,
    'name' => 'Georgia',
    'code' => 'GE',
    'currency' => 'GEL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  76 => 
  array (
    'id' => 77,
    'name' => 'French Guiana',
    'code' => 'GF',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  77 => 
  array (
    'id' => 78,
    'name' => 'Guernsey',
    'code' => 'GG',
    'currency' => 'GBP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  78 => 
  array (
    'id' => 79,
    'name' => 'Ghana',
    'code' => 'GH',
    'currency' => 'GHC',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  79 => 
  array (
    'id' => 80,
    'name' => 'Gibraltar',
    'code' => 'GI',
    'currency' => 'GIP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  80 => 
  array (
    'id' => 81,
    'name' => 'Greenland',
    'code' => 'GL',
    'currency' => 'DKK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  81 => 
  array (
    'id' => 82,
    'name' => 'The Gambia',
    'code' => 'GM',
    'currency' => 'GMD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  82 => 
  array (
    'id' => 83,
    'name' => 'Guinea',
    'code' => 'GN',
    'currency' => 'GNF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  83 => 
  array (
    'id' => 84,
    'name' => 'Guadeloupe',
    'code' => 'GP',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  84 => 
  array (
    'id' => 85,
    'name' => 'Equatorial Guinea',
    'code' => 'GQ',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  85 => 
  array (
    'id' => 86,
    'name' => 'Greece',
    'code' => 'GR',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  86 => 
  array (
    'id' => 87,
    'name' => 'South Georgia and the Sou',
    'code' => 'GS',
    'currency' => 'GBP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  87 => 
  array (
    'id' => 88,
    'name' => 'Guatemala',
    'code' => 'GT',
    'currency' => 'GTQ',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  88 => 
  array (
    'id' => 89,
    'name' => 'Guam',
    'code' => 'GU',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  89 => 
  array (
    'id' => 90,
    'name' => 'Guinea-Bissau',
    'code' => 'GW',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  90 => 
  array (
    'id' => 91,
    'name' => 'Guyana',
    'code' => 'GY',
    'currency' => 'GYD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  91 => 
  array (
    'id' => 92,
    'name' => 'Hong Kong (SAR)',
    'code' => 'HK',
    'currency' => 'HKD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  92 => 
  array (
    'id' => 93,
    'name' => 'Heard Island and McDonald',
    'code' => 'HM',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  93 => 
  array (
    'id' => 94,
    'name' => 'Honduras',
    'code' => 'HN',
    'currency' => 'HNL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  94 => 
  array (
    'id' => 95,
    'name' => 'Croatia',
    'code' => 'HR',
    'currency' => 'HRK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  95 => 
  array (
    'id' => 96,
    'name' => 'Haiti',
    'code' => 'HT',
    'currency' => 'HTG',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  96 => 
  array (
    'id' => 97,
    'name' => 'Hungary',
    'code' => 'HU',
    'currency' => 'HUF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  97 => 
  array (
    'id' => 98,
    'name' => 'Indonesia',
    'code' => 'ID',
    'currency' => 'IDR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  98 => 
  array (
    'id' => 99,
    'name' => 'Ireland',
    'code' => 'IE',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  99 => 
  array (
    'id' => 100,
    'name' => 'Israel',
    'code' => 'IL',
    'currency' => 'ILS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  100 => 
  array (
    'id' => 101,
    'name' => 'Man, Isle of',
    'code' => 'IM',
    'currency' => 'GBP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  101 => 
  array (
    'id' => 102,
    'name' => 'India',
    'code' => 'IN',
    'currency' => 'INR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  102 => 
  array (
    'id' => 103,
    'name' => 'British Indian Ocean Terr',
    'code' => 'IO',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  103 => 
  array (
    'id' => 104,
    'name' => 'Iraq',
    'code' => 'IQ',
    'currency' => 'IQD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  104 => 
  array (
    'id' => 105,
    'name' => 'Iran',
    'code' => 'IR',
    'currency' => 'IRR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  105 => 
  array (
    'id' => 106,
    'name' => 'Iceland',
    'code' => 'IS',
    'currency' => 'ISK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  106 => 
  array (
    'id' => 107,
    'name' => 'Italy',
    'code' => 'IT',
    'currency' => 'EUR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  107 => 
  array (
    'id' => 108,
    'name' => 'Jersey',
    'code' => 'JE',
    'currency' => 'GBP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  108 => 
  array (
    'id' => 109,
    'name' => 'Jamaica',
    'code' => 'JM',
    'currency' => 'JMD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  109 => 
  array (
    'id' => 110,
    'name' => 'Jordan',
    'code' => 'JO',
    'currency' => 'JOD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  110 => 
  array (
    'id' => 111,
    'name' => 'Japan',
    'code' => 'JP',
    'currency' => 'JPY',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  111 => 
  array (
    'id' => 112,
    'name' => 'Kenya',
    'code' => 'KE',
    'currency' => 'KES',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  112 => 
  array (
    'id' => 113,
    'name' => 'Kyrgyzstan',
    'code' => 'KG',
    'currency' => 'KGS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  113 => 
  array (
    'id' => 114,
    'name' => 'Cambodia',
    'code' => 'KH',
    'currency' => 'KHR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  114 => 
  array (
    'id' => 115,
    'name' => 'Kiribati',
    'code' => 'KI',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  115 => 
  array (
    'id' => 116,
    'name' => 'Comoros',
    'code' => 'KM',
    'currency' => 'KMF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  116 => 
  array (
    'id' => 117,
    'name' => 'Saint Kitts and Nevis',
    'code' => 'KN',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  117 => 
  array (
    'id' => 118,
    'name' => 'Korea, North',
    'code' => 'KP',
    'currency' => 'KPW',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  118 => 
  array (
    'id' => 119,
    'name' => 'Korea, South',
    'code' => 'KR',
    'currency' => 'KRW',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  119 => 
  array (
    'id' => 120,
    'name' => 'Kuwait',
    'code' => 'KW',
    'currency' => 'KWD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  120 => 
  array (
    'id' => 121,
    'name' => 'Cayman Islands',
    'code' => 'KY',
    'currency' => 'KYD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  121 => 
  array (
    'id' => 122,
    'name' => 'Kazakhstan',
    'code' => 'KZ',
    'currency' => 'KZT',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  122 => 
  array (
    'id' => 123,
    'name' => 'Laos',
    'code' => 'LA',
    'currency' => 'LAK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  123 => 
  array (
    'id' => 124,
    'name' => 'Lebanon',
    'code' => 'LB',
    'currency' => 'LBP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  124 => 
  array (
    'id' => 125,
    'name' => 'Saint Lucia',
    'code' => 'LC',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  125 => 
  array (
    'id' => 126,
    'name' => 'Liechtenstein',
    'code' => 'LI',
    'currency' => 'CHF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  126 => 
  array (
    'id' => 127,
    'name' => 'Sri Lanka',
    'code' => 'LK',
    'currency' => 'LKR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  127 => 
  array (
    'id' => 128,
    'name' => 'Liberia',
    'code' => 'LR',
    'currency' => 'LRD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  128 => 
  array (
    'id' => 129,
    'name' => 'Lesotho',
    'code' => 'LS',
    'currency' => 'LSL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  129 => 
  array (
    'id' => 130,
    'name' => 'Lithuania',
    'code' => 'LT',
    'currency' => 'LTL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  130 => 
  array (
    'id' => 131,
    'name' => 'Luxembourg',
    'code' => 'LU',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  131 => 
  array (
    'id' => 132,
    'name' => 'Latvia',
    'code' => 'LV',
    'currency' => 'LVL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  132 => 
  array (
    'id' => 133,
    'name' => 'Libya',
    'code' => 'LY',
    'currency' => 'LYD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  133 => 
  array (
    'id' => 134,
    'name' => 'Morocco',
    'code' => 'MA',
    'currency' => 'MAD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  134 => 
  array (
    'id' => 135,
    'name' => 'Monaco',
    'code' => 'MC',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  135 => 
  array (
    'id' => 136,
    'name' => 'Moldova',
    'code' => 'MD',
    'currency' => 'MDL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  136 => 
  array (
    'id' => 137,
    'name' => 'Madagascar',
    'code' => 'MG',
    'currency' => 'MGF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  137 => 
  array (
    'id' => 138,
    'name' => 'Marshall Islands',
    'code' => 'MH',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  138 => 
  array (
    'id' => 139,
    'name' => 'Macedonia, The Former Yug',
    'code' => 'MK',
    'currency' => 'MKD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  139 => 
  array (
    'id' => 140,
    'name' => 'Mali',
    'code' => 'ML',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  140 => 
  array (
    'id' => 141,
    'name' => 'Myanmar',
    'code' => 'MM',
    'currency' => 'MMK',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  141 => 
  array (
    'id' => 142,
    'name' => 'Mongolia',
    'code' => 'MN',
    'currency' => 'MNT',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  142 => 
  array (
    'id' => 143,
    'name' => 'Macao',
    'code' => 'MO',
    'currency' => 'MOP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  143 => 
  array (
    'id' => 144,
    'name' => 'Northern Mariana Islands',
    'code' => 'MP',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  144 => 
  array (
    'id' => 145,
    'name' => 'Martinique',
    'code' => 'MQ',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  145 => 
  array (
    'id' => 146,
    'name' => 'Mauritania',
    'code' => 'MR',
    'currency' => 'MRO',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  146 => 
  array (
    'id' => 147,
    'name' => 'Montserrat',
    'code' => 'MS',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  147 => 
  array (
    'id' => 148,
    'name' => 'Malta',
    'code' => 'MT',
    'currency' => 'MTL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  148 => 
  array (
    'id' => 149,
    'name' => 'Mauritius',
    'code' => 'MU',
    'currency' => 'MUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  149 => 
  array (
    'id' => 150,
    'name' => 'Maldives',
    'code' => 'MV',
    'currency' => 'MVR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  150 => 
  array (
    'id' => 151,
    'name' => 'Malawi',
    'code' => 'MW',
    'currency' => 'MWK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  151 => 
  array (
    'id' => 152,
    'name' => 'Mexico',
    'code' => 'MX',
    'currency' => 'MXN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  152 => 
  array (
    'id' => 153,
    'name' => 'Malaysia',
    'code' => 'MY',
    'currency' => 'MYR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  153 => 
  array (
    'id' => 154,
    'name' => 'Mozambique',
    'code' => 'MZ',
    'currency' => 'MZM',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  154 => 
  array (
    'id' => 155,
    'name' => 'Namibia',
    'code' => 'NA',
    'currency' => 'NAD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  155 => 
  array (
    'id' => 156,
    'name' => 'New Caledonia',
    'code' => 'NC',
    'currency' => 'XPF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  156 => 
  array (
    'id' => 157,
    'name' => 'Niger',
    'code' => 'NE',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  157 => 
  array (
    'id' => 158,
    'name' => 'Norfolk Island',
    'code' => 'NF',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  158 => 
  array (
    'id' => 159,
    'name' => 'Nigeria',
    'code' => 'NG',
    'currency' => 'NGN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  159 => 
  array (
    'id' => 160,
    'name' => 'Nicaragua',
    'code' => 'NI',
    'currency' => 'NIO',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  160 => 
  array (
    'id' => 161,
    'name' => 'Netherlands',
    'code' => 'NL',
    'currency' => 'EUR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  161 => 
  array (
    'id' => 162,
    'name' => 'Norway',
    'code' => 'NO',
    'currency' => 'NOK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  162 => 
  array (
    'id' => 163,
    'name' => 'Nepal',
    'code' => 'NP',
    'currency' => 'NPR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  163 => 
  array (
    'id' => 164,
    'name' => 'Nauru',
    'code' => 'NR',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  164 => 
  array (
    'id' => 165,
    'name' => 'Niue',
    'code' => 'NU',
    'currency' => 'NZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  165 => 
  array (
    'id' => 166,
    'name' => 'New Zealand',
    'code' => 'NZ',
    'currency' => 'NZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  166 => 
  array (
    'id' => 167,
    'name' => 'Oman',
    'code' => 'OM',
    'currency' => 'OMR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  167 => 
  array (
    'id' => 168,
    'name' => 'Panama',
    'code' => 'PA',
    'currency' => 'PAB',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  168 => 
  array (
    'id' => 169,
    'name' => 'Peru',
    'code' => 'PE',
    'currency' => 'PEN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  169 => 
  array (
    'id' => 170,
    'name' => 'French Polynesia',
    'code' => 'PF',
    'currency' => 'XPF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  170 => 
  array (
    'id' => 171,
    'name' => 'Papua New Guinea',
    'code' => 'PG',
    'currency' => 'PGK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  171 => 
  array (
    'id' => 172,
    'name' => 'Philippines',
    'code' => 'PH',
    'currency' => 'PHP',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  172 => 
  array (
    'id' => 173,
    'name' => 'Pakistan',
    'code' => 'PK',
    'currency' => 'PKR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  173 => 
  array (
    'id' => 174,
    'name' => 'Poland',
    'code' => 'PL',
    'currency' => 'PLN',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  174 => 
  array (
    'id' => 175,
    'name' => 'Saint Pierre and Miquelon',
    'code' => 'PM',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  175 => 
  array (
    'id' => 176,
    'name' => 'Pitcairn Islands',
    'code' => 'PN',
    'currency' => 'NZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  176 => 
  array (
    'id' => 177,
    'name' => 'Puerto Rico',
    'code' => 'PR',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  177 => 
  array (
    'id' => 178,
    'name' => 'Palestinian Territory, Oc',
    'code' => 'PS',
    'currency' => '',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  178 => 
  array (
    'id' => 179,
    'name' => 'Portugal',
    'code' => 'PT',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  179 => 
  array (
    'id' => 180,
    'name' => 'Palau',
    'code' => 'PW',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  180 => 
  array (
    'id' => 181,
    'name' => 'Paraguay',
    'code' => 'PY',
    'currency' => 'PYG',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  181 => 
  array (
    'id' => 182,
    'name' => 'Qatar',
    'code' => 'QA',
    'currency' => 'QAR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  182 => 
  array (
    'id' => 183,
    'name' => 'R',
    'code' => 'RE',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  183 => 
  array (
    'id' => 184,
    'name' => 'Romania',
    'code' => 'RO',
    'currency' => 'ROL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  184 => 
  array (
    'id' => 185,
    'name' => 'Russia',
    'code' => 'RU',
    'currency' => 'RUB',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  185 => 
  array (
    'id' => 186,
    'name' => 'Rwanda',
    'code' => 'RW',
    'currency' => 'RWF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  186 => 
  array (
    'id' => 187,
    'name' => 'Saudi Arabia',
    'code' => 'SA',
    'currency' => 'SAR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  187 => 
  array (
    'id' => 188,
    'name' => 'Solomon Islands',
    'code' => 'SB',
    'currency' => 'SBD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  188 => 
  array (
    'id' => 189,
    'name' => 'Seychelles',
    'code' => 'SC',
    'currency' => 'SCR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  189 => 
  array (
    'id' => 190,
    'name' => 'Sudan',
    'code' => 'SD',
    'currency' => 'SDD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  190 => 
  array (
    'id' => 191,
    'name' => 'Sweden',
    'code' => 'SE',
    'currency' => 'SEK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  191 => 
  array (
    'id' => 192,
    'name' => 'Singapore',
    'code' => 'SG',
    'currency' => 'SGD',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  192 => 
  array (
    'id' => 193,
    'name' => 'Saint Helena',
    'code' => 'SH',
    'currency' => 'SHP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  193 => 
  array (
    'id' => 194,
    'name' => 'Slovenia',
    'code' => 'SI',
    'currency' => 'SIT',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  194 => 
  array (
    'id' => 195,
    'name' => 'Svalbard',
    'code' => 'SJ',
    'currency' => 'NOK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  195 => 
  array (
    'id' => 196,
    'name' => 'Slovakia',
    'code' => 'SK',
    'currency' => 'SKK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  196 => 
  array (
    'id' => 197,
    'name' => 'Sierra Leone',
    'code' => 'SL',
    'currency' => 'SLL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  197 => 
  array (
    'id' => 198,
    'name' => 'San Marino',
    'code' => 'SM',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  198 => 
  array (
    'id' => 199,
    'name' => 'Senegal',
    'code' => 'SN',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  199 => 
  array (
    'id' => 200,
    'name' => 'Somalia',
    'code' => 'SO',
    'currency' => 'SOS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  200 => 
  array (
    'id' => 201,
    'name' => 'Suriname',
    'code' => 'SR',
    'currency' => 'SRG',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  201 => 
  array (
    'id' => 202,
    'name' => 'S',
    'code' => 'ST',
    'currency' => 'STD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  202 => 
  array (
    'id' => 203,
    'name' => 'El Salvador',
    'code' => 'SV',
    'currency' => 'SVC',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  203 => 
  array (
    'id' => 204,
    'name' => 'Syria',
    'code' => 'SY',
    'currency' => 'SYP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  204 => 
  array (
    'id' => 205,
    'name' => 'Swaziland',
    'code' => 'SZ',
    'currency' => 'SZL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  205 => 
  array (
    'id' => 206,
    'name' => 'Turks and Caicos Islands',
    'code' => 'TC',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  206 => 
  array (
    'id' => 207,
    'name' => 'Chad',
    'code' => 'TD',
    'currency' => 'XAF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  207 => 
  array (
    'id' => 208,
    'name' => 'French Southern and Antar',
    'code' => 'TF',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  208 => 
  array (
    'id' => 209,
    'name' => 'Togo',
    'code' => 'TG',
    'currency' => 'XOF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  209 => 
  array (
    'id' => 210,
    'name' => 'Thailand',
    'code' => 'TH',
    'currency' => 'THB',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  210 => 
  array (
    'id' => 211,
    'name' => 'Tajikistan',
    'code' => 'TJ',
    'currency' => 'TJS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  211 => 
  array (
    'id' => 212,
    'name' => 'Tokelau',
    'code' => 'TK',
    'currency' => 'NZD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  212 => 
  array (
    'id' => 213,
    'name' => 'Turkmenistan',
    'code' => 'TM',
    'currency' => 'TMM',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  213 => 
  array (
    'id' => 214,
    'name' => 'Tunisia',
    'code' => 'TN',
    'currency' => 'TND',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  214 => 
  array (
    'id' => 215,
    'name' => 'Tonga',
    'code' => 'TO',
    'currency' => 'TOP',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  215 => 
  array (
    'id' => 216,
    'name' => 'East Timor',
    'code' => 'TP',
    'currency' => 'TPE',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  216 => 
  array (
    'id' => 217,
    'name' => 'Turkey',
    'code' => 'TR',
    'currency' => 'TRL',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  217 => 
  array (
    'id' => 218,
    'name' => 'Trinidad and Tobago',
    'code' => 'TT',
    'currency' => 'TTD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  218 => 
  array (
    'id' => 219,
    'name' => 'Tuvalu',
    'code' => 'TV',
    'currency' => 'AUD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  219 => 
  array (
    'id' => 220,
    'name' => 'Taiwan',
    'code' => 'TW',
    'currency' => 'TWD',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  220 => 
  array (
    'id' => 221,
    'name' => 'Tanzania',
    'code' => 'TZ',
    'currency' => 'TZS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  221 => 
  array (
    'id' => 222,
    'name' => 'Ukraine',
    'code' => 'UA',
    'currency' => 'UAH',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  222 => 
  array (
    'id' => 223,
    'name' => 'Uganda',
    'code' => 'UG',
    'currency' => 'UGX',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  223 => 
  array (
    'id' => 224,
    'name' => 'United Kingdom',
    'code' => 'UK',
    'currency' => 'GBP',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  224 => 
  array (
    'id' => 225,
    'name' => 'United States Minor Outly',
    'code' => 'UM',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  225 => 
  array (
    'id' => 226,
    'name' => 'United States',
    'code' => 'US',
    'currency' => 'USD',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  226 => 
  array (
    'id' => 227,
    'name' => 'Uruguay',
    'code' => 'UY',
    'currency' => 'UYU',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  227 => 
  array (
    'id' => 228,
    'name' => 'Uzbekistan',
    'code' => 'UZ',
    'currency' => 'UZS',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  228 => 
  array (
    'id' => 229,
    'name' => 'Holy See (Vatican City)',
    'code' => 'VA',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  229 => 
  array (
    'id' => 230,
    'name' => 'Saint Vincent and the Gre',
    'code' => 'VC',
    'currency' => 'XCD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  230 => 
  array (
    'id' => 231,
    'name' => 'Venezuela',
    'code' => 'VE',
    'currency' => 'VEB',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  231 => 
  array (
    'id' => 232,
    'name' => 'British Virgin Islands',
    'code' => 'VG',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  232 => 
  array (
    'id' => 233,
    'name' => 'Virgin Islands',
    'code' => 'VI',
    'currency' => 'USD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  233 => 
  array (
    'id' => 234,
    'name' => 'Vietnam',
    'code' => 'VN',
    'currency' => 'VND',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  234 => 
  array (
    'id' => 235,
    'name' => 'Vanuatu',
    'code' => 'VU',
    'currency' => 'VUV',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  235 => 
  array (
    'id' => 236,
    'name' => 'Wallis and Futuna',
    'code' => 'WF',
    'currency' => 'XPF',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  236 => 
  array (
    'id' => 237,
    'name' => 'Samoa',
    'code' => 'WS',
    'currency' => 'WST',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  237 => 
  array (
    'id' => 238,
    'name' => 'Yemen',
    'code' => 'YE',
    'currency' => 'YER',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  238 => 
  array (
    'id' => 239,
    'name' => 'Mayotte',
    'code' => 'YT',
    'currency' => 'EUR',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  239 => 
  array (
    'id' => 240,
    'name' => 'Yugoslavia',
    'code' => 'YU',
    'currency' => 'YUM',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  240 => 
  array (
    'id' => 241,
    'name' => 'South Africa',
    'code' => 'ZA',
    'currency' => 'ZAR',
    'is_major' => 1,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  241 => 
  array (
    'id' => 242,
    'name' => 'Zambia',
    'code' => 'ZM',
    'currency' => 'ZMK',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
  242 => 
  array (
    'id' => 243,
    'name' => 'Zimbabwe',
    'code' => 'ZW',
    'currency' => 'ZWD',
    'is_major' => 0,
    'time_created' => 1312182180,
    'time_updated' => 1312182180,
  ),
);

		DB::table('countries')->insert($countries);
	}

}
