package com.blogproject.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.blogproject.dto.RegisterRequest;
import com.blogproject.service.AuthService;




@RestController
@RequestMapping("/api/auth")
public class BlogController {
	
	@Autowired
	private AuthService authService;
	
	@PostMapping("/signup")
	public ResponseEntity<RegisterRequest> signup(@RequestBody RegisterRequest request) {
		authService.signUp(request);
		return new ResponseEntity<RegisterRequest>(HttpStatus.OK);
	}
	
	@GetMapping("/hello")
	public String test(@RequestBody RegisterRequest request) {
		return "hello";
	}

}
