package com.blogproject.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.blogproject.dto.RegisterRequest;
import com.blogproject.model.User;
import com.blogproject.repository.UserRepository;


@Service
public class AuthService {
	
	@Autowired
	private UserRepository userRepository;

	public void signUp(RegisterRequest request) {
		User user = new User();
		
		user.setUserName(request.getUsername());
		user.setPassword(request.getPassword());
		user.setEmail(request.getEmail());
		
		userRepository.save(user);

	}

}
