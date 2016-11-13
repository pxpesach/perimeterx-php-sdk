<?php
namespace Perimeterx\Tests;

require_once __DIR__ . '/../vendor/autoload.php';

/* CHANGE VALUES TO MAKE TESTS WORK */
define('PX_APP_ID', 'PXMI1FuMjS');
define('PX_COOKIE_KEY', '1cC1Al/30j9CFNAMj171/CF8aGWRXMRM6YysylfaJBERNYSC6lGnpdJj+VPypdq5');
define('PX_LOCAL_IP_ADDR', '127.0.0.1'); // ip address of the machine running the tests
define('PX_AUTH_TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzY29wZXMiOlsicmlza19zY29yZSIsInJlc3RfYXBpIl0sImlhdCI6MTQ2NTkwOTQ2OCwic3ViIjoiUFhNSTFGdU1qUyIsImp0aSI6ImY4MjE4YzMyLTRiOGYtNDY1Ni1hNDZjLWJlMjZjMzhjODgzMiJ9.YNWqnHneG3HHegkLz0rq9G3m_NNEkPxOhUCTQBefQsU');


/* DO NOT CHANGE */
define('PX_SERVER_URL', 'http://collector.perimeterx.net');
define('PX_ACTIVITY_PAYLOAD', 'payload=W3sidCI6IlBYMyIsImQiOnsiUFg4OCI6dHJ1ZSwiUFgxNjkiOjcsIlBYODkiOnRydWUsIlBYMTcwIjo1LCJQWDg1IjpbIldpZGV2aW5lIENvbnRlbnQgRGVjcnlwdGlvbiBNb2R1bGUiLCJTaG9ja3dhdmUgRmxhc2giLCJDaHJvbWUgUERGIFZpZXdlciIsIk5hdGl2ZSBDbGllbnQiLCJDaHJvbWUgUERGIFZpZXdlciJdLCJQWDU5IjoiTW96aWxsYS81LjAgKE1hY2ludG9zaDsgSW50ZWwgTWFjIE9TIFggMTBfMTJfMSkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzU0LjAuMjg0MC44NyBTYWZhcmkvNTM3LjM2IiwiUFg2MSI6ImVuLVVTIiwiUFg2MiI6IkdlY2tvIiwiUFg2MyI6Ik1hY0ludGVsIiwiUFg2NCI6IjUuMCAoTWFjaW50b3NoOyBJbnRlbCBNYWMgT1MgWCAxMF8xMl8xKSBBcHBsZVdlYktpdC81MzcuMzYgKEtIVE1MLCBsaWtlIEdlY2tvKSBDaHJvbWUvNTQuMC4yODQwLjg3IFNhZmFyaS81MzcuMzYiLCJQWDY1IjoiTmV0c2NhcGUiLCJQWDY2IjoiTW96aWxsYSIsIlBYNjciOiJtaXNzaW5nIiwiUFg2OSI6IjIwMDMwMTA3IiwiUFg2MCI6dHJ1ZSwiUFg2OCI6dHJ1ZSwiUFgxNjMiOnRydWUsIlBYODYiOnRydWUsIlBYODciOnRydWUsIlBYOTAiOlsibG9hZFRpbWVzIiwiY3NpIiwiYXBwIiwid2Vic3RvcmUiLCJydW50aW1lIl0sIlBYMTkwIjoiIiwiUFg5MSI6MjU2MCwiUFg5MiI6MTQ0MCwiUFg5MyI6IjI1NjBYMTQ0MCIsIlBYOTQiOjQsIlBYOTUiOnRydWUsIlBYMTU1IjoiU3VuIE5vdiAxMyAyMDE2IDE1OjUwOjU1IEdNVCswMjAwIChJU1QpIiwiUFg5NiI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODg4OC9pbmRleC5waHAiLCJQWDU1IjoiaHR0cCUzQSUyRiUyRmxvY2FsaG9zdCUzQTg4ODglMkZpbmRleC5waHAiLCJQWDEzNSI6dHJ1ZSwiUFgxMzQiOnRydWUsIlBYMTMzIjp0cnVlLCJQWDEzOCI6dHJ1ZSwiUFgxMzkiOnRydWUsIlBYMTQwIjp0cnVlLCJQWDE0MSI6ZmFsc2UsIlBYMTQyIjp0cnVlLCJQWDE0MyI6dHJ1ZSwiUFgxNDQiOnRydWUsIlBYMTQ1Ijp0cnVlLCJQWDE0NiI6dHJ1ZSwiUFgxNDciOmZhbHNlLCJQWDE0OCI6ZmFsc2UsIlBYMTQ5Ijp0cnVlLCJQWDE1MCI6dHJ1ZSwiUFgxNTEiOmZhbHNlLCJQWDE1MiI6ZmFsc2UsIlBYMTUzIjpmYWxzZSwiUFgxNTQiOi0xMjAsIlBYMTY2Ijp0cnVlLCJQWDE2NyI6dHJ1ZSwiUFgxODQiOnRydWUsIlBYMTg1Ijo3NTgsIlBYMTg2IjoyNTYwLCJQWDE4NyI6MCwiUFgxODgiOjAsIlBYMTkxIjowLCJQWDE5MiI6ZmFsc2UsIlBYMTk0IjpmYWxzZSwiUFgxOTUiOnRydWUsIlBYMTk2IjpmYWxzZSwiUFgyMDciOmZhbHNlLCJQWDIwOCI6InZpc2libGUiLCJQWDIxOCI6MCwiUFgyMjkiOjI0LCJQWDIzMCI6MjQsIlBYMjMxIjoxNDEzLCJQWDIzMiI6MjU2MH19LHsidCI6IlBYMTc1IiwiZCI6eyJQWDgyIjoiMjU2MHg0NzgiLCJQWDE3NiI6InN0b3JhZ2VfZmx1c2hlZCIsIlBYMTc3IjoxNDc5MDQ1MDQ4Nzc1LCJQWDE4MSI6IjJlZTUwNjYwLWE5YTgtMTFlNi1iYzZiLTczY2VmZWZhM2E5OSIsIlBYMTc4IjowLCJQWDE3OSI6eyJuYW1lIjoxfSwiUFgxODAiOiJodHRwOi8vbG9jYWxob3N0Ojg4ODgvaW5kZXgucGhwIiwiUFg1OCI6W3siUFg3MSI6Im1vdXNlbW92ZSIsIlBYMTU5IjoidHJ1ZSIsIlBYMTcyIjoiMzI1LDYyNyw2NzJ8MzM0LDYyMiwxMTJ8MTcxLDI0MiwxNTg4fDU1MSwyNjMsMjAzNHwzODUsNTU4LDMyOCJ9LHsiUFg3MSI6ImJsdXIiLCJQWDE1OSI6InRydWUiLCJQWDcyIjoxLCJQWDczIjoiaW5wdXQiLCJQWDc0IjozMDAsIlBYNzUiOjQ0LCJQWDc2IjozOTAsIlBYNzciOjExMzAsIlBYNzAiOjU3MTZ9XX19LHsidCI6IlBYMjMiLCJkIjp7IlBYMTIzIjoiMmVlNTA2NjAtYTlhOC0xMWU2LWJjNmItNzNjZWZlZmEzYTk5IiwiUFgxMjQiOjE0NzkwNDUwNDY5MDYsIlBYMTI5IjozMjMsIlBYMTk4IjoxMjI1LjE3LCJQWDE5OSI6NjM1LjE0MDAwMDAwMDAwMDEsIlBYMjAwIjo2MjAuMzIsIlBYMjAxIjo4MDcuNDk1LCJQWDIwMiI6ODE0N319LHsidCI6IlBYMTk3IiwiZCI6eyJQWDE5MSI6MCwiUFgxODYiOjI1NjAsIlBYMTg1Ijo3NTgsIlBYNTUiOiJodHRwJTNBJTJGJTJGbG9jYWxob3N0JTNBODg4OCUyRmluZGV4LnBocCIsIlBYMTg0Ijp0cnVlLCJQWDIyNSI6MX19XQ==&appId=' . PX_APP_ID . '&tag=v2.25&uuid=a5ab1930-32d7-11e6-b14c-f3f37f8d0f8e');

define('PX_ACTIVITY_BAD_PAYLOAD', 'payload=W3sidCI6IlBYMyIsImQiOnsiUFg4OCI6dHJ1ZSwiUFgxNjkiOjcsIlBYODkiOnRydWUsIlBYMTcwIjo1LCJQWDg1IjpbIldpZGV2aW5lIENvbnRlbnQgRGVjcnlwdGlvbiBNb2R1bGUiLCJTaG9ja3dhdmUgRmxhc2giLCJDaHJvbWUgUERGIFZpZXdlciIsIk5hdGl2ZSBDbGllbnQiLCJDaHJvbWUgUERGIFZpZXdlciJdLCJQWDU5IjoiTW96aWxsYS81LjAgKE1hY2ludG9zaDsgSW50ZWwgTWFjIE9TIFggMTBfMTJfMSkgQXBwbGVXZWJLaXQvNTM3LjM2IChLSFRNTCwgbGlrZSBHZWNrbykgQ2hyb21lLzU0LjAuMjg0MC44NyBTYWZhcmkvNTM3LjM2IiwiUFg2MSI6ImVuLVVTIiwiUFg2MiI6IkdlY2tvIiwiUFg2MyI6Ik1hY0ludGVsIiwiUFg2NCI6IjUuMCAoTWFjaW50b3NoOyBJbnRlbCBNYWMgT1MgWCAxMF8xMl8xKSBBcHBsZVdlYktpdC81MzcuMzYgKEtIVE1MLCBsaWtlIEdlY2tvKSBDaHJvbWUvNTQuMC4yODQwLjg3IFNhZmFyaS81MzcuMzYiLCJQWDY1IjoiTmV0c2NhcGUiLCJQWDY2IjoiTW96aWxsYSIsIlBYNjciOiJtaXNzaW5nIiwiUFg2OSI6IjIwMDMwMTA3IiwiUFg2MCI6dHJ1ZSwiUFg2OCI6dHJ1ZSwiUFgxNjMiOnRydWUsIlBYODYiOnRydWUsIlBYODciOnRydWUsIlBYOTAiOlsibG9hZFRpbWVzIiwiY3NpIiwiYXBwIiwid2Vic3RvcmUiLCJydW50aW1lIl0sIlBYMTkwIjoiIiwiUFg5MSI6MjU2MCwiUFg5MiI6MTQ0MCwiUFg5MyI6IjI1NjBYMTQ0MCIsIlBYOTQiOjQsIlBYOTUiOnRydWUsIlBYMTU1IjoiU3VuIE5vdiAxMyAyMDE2IDE1OjM3OjQyIEdNVCswMjAwIChJU1QpIiwiUFg5NiI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODg4OC9pbmRleC5waHAiLCJQWDU1IjoiaHR0cCUzQSUyRiUyRmxvY2FsaG9zdCUzQTg4ODglMkZpbmRleC5waHAiLCJQWDEzNSI6dHJ1ZSwiUFgxMzQiOnRydWUsIlBYMTMzIjp0cnVlLCJQWDEzOCI6dHJ1ZSwiUFgxMzkiOnRydWUsIlBYMTQwIjp0cnVlLCJQWDE0MSI6ZmFsc2UsIlBYMTQyIjp0cnVlLCJQWDE0MyI6dHJ1ZSwiUFgxNDQiOnRydWUsIlBYMTQ1Ijp0cnVlLCJQWDE0NiI6dHJ1ZSwiUFgxNDciOmZhbHNlLCJQWDE0OCI6ZmFsc2UsIlBYMTQ5Ijp0cnVlLCJQWDE1MCI6dHJ1ZSwiUFgxNTEiOmZhbHNlLCJQWDE1MiI6ZmFsc2UsIlBYMTUzIjpmYWxzZSwiUFgxNTQiOi0xMjAsIlBYMTY2Ijp0cnVlLCJQWDE2NyI6dHJ1ZSwiUFgxODQiOnRydWUsIlBYMTg1Ijo3NTgsIlBYMTg2IjoyNTYwLCJQWDE4NyI6MCwiUFgxODgiOjAsIlBYMTkxIjowLCJQWDE5MiI6ZmFsc2UsIlBYMTk0IjpmYWxzZSwiUFgxOTUiOnRydWUsIlBYMTk2IjpmYWxzZSwiUFgyMDciOmZhbHNlLCJQWDIwOCI6InZpc2libGUiLCJQWDIxOCI6MCwiUFgyMjkiOjI0LCJQWDIzMCI6MjQsIlBYMjMxIjoxNDEzLCJQWDIzMiI6MjU2MH19LHsidCI6IlBYMjMiLCJkIjp7IlBYMTIzIjoiOTg3ZWE5YTAtYTlhMy0xMWU2LTk0ODEtMDNhYzIwMmE1ZDMwIiwiUFgxMjQiOjE0NzkwNDMwNzc2OTAsIlBYMTI5IjoxNjM2LCJQWDE5OCI6NjMzLjM0LCJQWDE5OSI6MTI3LjI4NTAwMDAwMDAwMDA4LCJQWDIwMCI6NTE1Ljk1LCJQWDIwMSI6Mjc3LjYwNSwiUFgyMDIiOjExNTkwODR9fSx7InQiOiJQWDE5NyIsImQiOnsiUFgxOTEiOjAsIlBYMTg2IjoyNTYwLCJQWDE4NSI6NzU4LCJQWDU1IjoiaHR0cCUzQSUyRiUyRmxvY2FsaG9zdCUzQTg4ODglMkZpbmRleC5waHAiLCJQWDE4NCI6dHJ1ZSwiUFgyMjUiOjF9fV0=&appId=' . PX_APP_ID . '&tag=v2.25&uuid=a5ab1930-32d7-11e6-b14c-f3f37f8d0f8e');

// Delete the temp test user after all tests have fired
register_shutdown_function(function () {

});