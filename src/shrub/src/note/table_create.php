<?php
require_once __DIR__."/note.php";

const DB_TYPE_NOTE_BODY = 'MEDIUMTEXT NOT NULL';	// MEDIUMTEXT: 2^24 characters
const DB_TYPE_NOTE_HOPS = 'INT NOT NULL';			// INT: 2^16 signed (32k)

// Simliar to the regular NOTE, but just a snapshot
// IMPORTANT: This has to come first, just in case the NOTE table needs to make notes
$table = 'SH_TABLE_NOTE_VERSION';
if ( in_array($table, $TABLE_LIST) ) {
	$ok = null;

	table_Init($table);
	switch ( $TABLE_VERSION ) {
	case 0:
		// NOTES:
		// - author is the author of the version, not the author of the note
	
		$ok = table_Create( $table,
			"CREATE TABLE ".SH_TABLE_PREFIX.constant($table)." (
				id ".DB_TYPE_UID.",
				note ".DB_TYPE_ID.",
					INDEX(note),
				author ".DB_TYPE_ID.",
				timestamp ".DB_TYPE_TIMESTAMP.",
				body ".DB_TYPE_NOTE_BODY.",
				tag ".DB_TYPE_ASCII(32)."
			)".DB_CREATE_SUFFIX);
		$created = true;
		if (!$ok) break; $TABLE_VERSION++;
	};
	table_Exit($table);
}

$table = 'SH_TABLE_NOTE_TREE';
if ( in_array($table, $TABLE_LIST) ) {
	$ok = null;

	table_Init($table);
	switch ( $TABLE_VERSION ) {
	case 0:
		$ok = table_Create( $table,
			"CREATE TABLE ".SH_TABLE_PREFIX.constant($table)." (
				id ".DB_TYPE_UID.",
				node ".DB_TYPE_ID.",
					INDEX(node),
				note ".DB_TYPE_ID.",
					INDEX(note),
				ancestor ".DB_TYPE_ID.",
					INDEX(ancestor),
				hops ".DB_TYPE_NOTE_HOPS.",
					INDEX(hops)				
			)".DB_CREATE_SUFFIX);
		$created = true;
		if (!$ok) break; $TABLE_VERSION++;
	};
	table_Exit($table);
}

$table = 'SH_TABLE_NOTE';
if ( in_array($table, $TABLE_LIST) ) {
	$ok = null;

	table_Init($table);
	switch ( $TABLE_VERSION ) {
	case 0:
		// No "published" date, just modified, as comments aren't drafted
	
		$ok = table_Create( $table,
			"CREATE TABLE ".SH_TABLE_PREFIX.constant($table)." (
				id ".DB_TYPE_UID.",
				node ".DB_TYPE_ID.",
					INDEX(node),
				author ".DB_TYPE_ID.",
					INDEX(author),
				created ".DB_TYPE_TIMESTAMP.",
				modified ".DB_TYPE_TIMESTAMP.",
					INDEX(modified),
				version ".DB_TYPE_ID.",
				body ".DB_TYPE_NOTE_BODY."
			)".DB_CREATE_SUFFIX);
		$created = true;
		if (!$ok) break; $TABLE_VERSION++;
	};

	table_Exit($table);
}

$table = 'SH_TABLE_NOTE_LOVE';
if ( in_array($table, $TABLE_LIST) ) {
	$ok = null;
	
	// NOTE: What is love(d), baby don't hurt me
	// AUTHOR: Who loves it
	// IP: IP address of who loves it (if anonymous)
	
	table_Init($table);
	switch ( $TABLE_VERSION ) {
	case 0:
		$ok = table_Create( $table,
			"CREATE TABLE ".SH_TABLE_PREFIX.constant($table)." (
				id ".DB_TYPE_UID.",
				note ".DB_TYPE_ID.",
					INDEX(note),
				author ".DB_TYPE_ID.",
				ip ".DB_TYPE_IP.",
					UNIQUE `node_author_ip` (note, author, ip),
				timestamp ".DB_TYPE_TIMESTAMP."
			)".DB_CREATE_SUFFIX);
		$created = true;
		if (!$ok) break; $TABLE_VERSION++;
	};
	table_Exit($table);
}

