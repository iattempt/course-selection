@extends( ($general->identity === "student")
            ? 'student' : (($general->identity === "professor")
            ? 'professor' : ($general->identity === "authority"
            ? 'authority' : 'errors/404')))

