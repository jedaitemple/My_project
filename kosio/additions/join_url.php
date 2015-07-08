<?php



/**
 * This function joins together URL components to form a complete URL.
 *
 * RFC3986 specifies the components of a Uniform Resource Identifier (URI).
 * This function implements the specification's "component recomposition"
 * algorithm for combining URI components into a full URI string.
 *
 * The $parts argument is an associative array containing zero or
 * more of the following:
 *
 *	"scheme"	The scheme, such as "http".
 *	"host"		The host name, IPv4, or IPv6 address.
 *	"port"		The port number.
 *	"user"		The user name.
 *	"pass"		The user password.
 *	"path"		The path, such as a file path for "http".
 *	"query"		The query.
 *	"fragment"	The fragment.
 *
 * The "port", "user", and "pass" values are only used when a "host"
 * is present.
 *
 * The optional $encode argument indicates if appropriate URL components
 * should be percent-encoded as they are assembled into the URL.  Encoding
 * is only applied to the "user", "pass", "host" (if a host name, not an
 * IP address), "path", "query", and "fragment" components.  The "scheme"
 * and "port" are never encoded.  When a "scheme" and "host" are both
 * present, the "path" is presumed to be hierarchical and encoding
 * processes each segment of the hierarchy separately (i.e., the slashes
 * are left alone).
 *
 * The assembled URL string is returned.
 *
 * Parameters:
 * 	parts		an associative array of strings containing the
 * 			individual parts of a URL.
 *
 * 	encode		an optional boolean flag selecting whether
 * 			to do percent encoding or not.  Default = true.
 *
 * Return values:
 * 	Returns the assembled URL string.  The string is an absolute
 * 	URL if a scheme is supplied, and a relative URL if not.  An
 * 	empty string is returned if the $parts array does not contain
 * 	any of the needed values.
 */
function join_url( $parts, $encode=TRUE )
{
	if ( $encode )
	{
		if ( isset( $parts['user'] ) )
			$parts['user']     = rawurlencode( $parts['user'] );
		if ( isset( $parts['pass'] ) )
			$parts['pass']     = rawurlencode( $parts['pass'] );
		if ( isset( $parts['host'] ) &&
			!preg_match( '!^(\[[\da-f.:]+\]])|([\da-f.:]+)$!ui', $parts['host'] ) )
			$parts['host']     = rawurlencode( $parts['host'] );
		if ( !empty( $parts['path'] ) )
			$parts['path']     = preg_replace( '!%2F!ui', '/',
				rawurlencode( $parts['path'] ) );
		if ( isset( $parts['query'] ) )
			$parts['query']    = rawurlencode( $parts['query'] );
		if ( isset( $parts['fragment'] ) )
			$parts['fragment'] = rawurlencode( $parts['fragment'] );
	}

	$url = '';
	if ( !empty( $parts['scheme'] ) )
		$url .= $parts['scheme'] . ':';
	if ( isset( $parts['host'] ) )
	{
		$url .= '//';
		if ( isset( $parts['user'] ) )
		{
			$url .= $parts['user'];
			if ( isset( $parts['pass'] ) )
				$url .= ':' . $parts['pass'];
			$url .= '@';
		}
		if ( preg_match( '!^[\da-f]*:[\da-f.:]+$!ui', $parts['host'] ) )
			$url .= '[' . $parts['host'] . ']';	// IPv6
		else
			$url .= $parts['host'];			// IPv4 or name
		if ( isset( $parts['port'] ) )
			$url .= ':' . $parts['port'];
		if ( !empty( $parts['path'] ) && $parts['path'][0] != '/' )
			$url .= '/';
	}
	if ( !empty( $parts['path'] ) )
		$url .= $parts['path'];
	if ( isset( $parts['query'] ) )
		$url .= '?' . $parts['query'];
	if ( isset( $parts['fragment'] ) )
		$url .= '#' . $parts['fragment'];
	return $url;
}

?>
