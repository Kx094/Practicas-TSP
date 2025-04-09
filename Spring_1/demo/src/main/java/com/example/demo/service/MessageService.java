package com.example.demo.service;

import org.springframework.stereotype.Service;

@Service
public class MessageService {
    public String processMessage(String message) {
        return "Mensaje: " + message;
    }
}