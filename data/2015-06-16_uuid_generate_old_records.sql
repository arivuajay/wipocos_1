UPDATE wipo_author_account
SET Auth_GUID = UUID()
WHERE Auth_GUID = ''
OR Auth_GUID IS null;

UPDATE wipo_performer_account
SET Perf_GUID = UUID()
WHERE Perf_GUID = ''
OR Perf_GUID IS null;

UPDATE wipo_publisher_account
SET Pub_GUID = UUID()
WHERE Pub_GUID = ''
OR Pub_GUID IS null;

UPDATE wipo_producer_account
SET Pro_GUID = UUID()
WHERE Pro_GUID = ''
OR Pro_GUID IS NULL;

UPDATE wipo_group
SET Group_GUID = UUID()
WHERE Group_GUID = ''
OR Group_GUID IS NULL;

UPDATE wipo_publisher_group
SET Pub_Group_GUID = UUID()
WHERE Pub_Group_GUID = ''
OR Pub_Group_GUID IS NULL;

TRUNCATE TABLE wipo_group_members;

TRUNCATE TABLE wipo_publisher_group_members;

