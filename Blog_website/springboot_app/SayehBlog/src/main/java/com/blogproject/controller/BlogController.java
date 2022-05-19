package com.blogproject.controller;

import java.util.logging.Logger;

import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.blogproject.dto.LoginRequest;
import com.blogproject.dto.RegisterRequest;
import com.blogproject.service.AuthService;




@RestController
@RequestMapping("/api/auth")
public class BlogController {
	
	private org.slf4j.Logger LOGGER = LoggerFactory.getLogger(BlogController.class);
	
	@Autowired
	private AuthService authService;
	
	@PostMapping("/signup")
	public ResponseEntity<RegisterRequest> signup(@RequestBody RegisterRequest register) {
		authService.signUp(register);
		return new ResponseEntity<RegisterRequest>(HttpStatus.OK);
	}
	
	@PostMapping("/login")
	public String login(@RequestBody LoginRequest login) {
		
		LOGGER.info("Login Request Params: {} {}", login.getUsername(), login.getPassword());
		return authService.login(login);
	}

}
