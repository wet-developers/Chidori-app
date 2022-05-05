package com.blogproject.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import com.blogproject.dto.RegisterRequest;
import com.blogproject.model.LoginRequest;
import com.blogproject.model.User;
import com.blogproject.repository.UserRepository;


@Service
public class AuthService {
	
	@Autowired
	private UserRepository userRepository;
	
	@Autowired
	private PasswordEncoder passwordEncoder;

	public void signUp(RegisterRequest request) {
		User user = new User();
		
		user.setUserName(request.getUsername());
		user.setPassword(encodePassword(request.getPassword()));
		user.setEmail(request.getEmail());
		
		userRepository.save(user);

	}
	
	private String encodePassword(String password) {
		return passwordEncoder.encode(password);
	}

	public void login(LoginRequest login) {
		// TODO Auto-generated method stub
		
	}

}
