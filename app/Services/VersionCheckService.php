<?php namespace App\Services;

class VersionCheckService {

	protected $url = 'https://secure.php.net';

	public function __construct()
	{
		$this->http = new \Requests_Session($this->url);
		$this->http->headers['Accept'] = 'application/json';
	}

	public function check($version = 5, $count = 10)
	{
		$query = [
			'version' => $version,
			'json' => true,
			'max' => $count,
		];

		$response = $this->http->get('/releases?' . http_build_query($query));
		$versions = $this->normalize(json_decode($response->body));

		return $versions;
	}

	private function normalize($versions)
	{
		$normalized = [];

		foreach($versions as $version => $data)
		{
			$version = explode('.', $version);

			$url = (isset($data->announcement->English)) ? $this->url . $data->announcement->English : '';
			$normalized[] = [
				'major' => $version[0],
				'minor' => $version[1],
				'patch' => $version[2],
				'url' => $url,
				'release_date' => (isset($data->date)) ? $data->date : $data->source[0]->date
			];
		}

		return $normalized;
	}

}