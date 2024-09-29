from moviepy.editor import VideoFileClip

# Load the video file
video = VideoFileClip("invincible.mp4")
# need to install pip install moviepy
# Extract audio and save as MP3
video.audio.write_audiofile("invincible.mp3")
