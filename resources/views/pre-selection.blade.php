@extends( ($general->title === "student")
            ? 'student' : (($general->title === "Professor")
            ? 'professor' : ($general->title === "Authority"
            ? 'authority' : 'errors/404')))
