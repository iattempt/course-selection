@extends( ($general->title === "student")
            ? 'student' : (($general->title === "professor")
            ? 'professor' : ($general->title === "authority"
            ? 'authority' : 'errors/404')))

