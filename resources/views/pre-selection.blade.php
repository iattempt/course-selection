@extends( ($auth === "student")
            ? 'student' : (($auth === "professor")
            ? 'professor' : ($auth === "authority"
            ? 'authority' : 'errors/404')))
